@extends('layouts.admin')

@section('title', 'Agenda')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDeskripsi" tabindex="-1" aria-labelledby="modalDeskripsiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeskripsiLabel">Tambah Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Tanggal: <span id="modalTanggal"></span></p>
                <div class="col-md-12 mb-3">
                    <label>Lokasi</label>
                    <select class="form-control" name="nama_lokasi" id="lokasi_nama" required>
                        <option value="">Pilih Lokasi</option>
                        @foreach($lokasi as $l)
                        <option data-id="{{ $l->lokasi_id }}" value="{{ $l->nama_lokasi }}">{{ $l->nama_lokasi }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="lokasi_id" id="lokasi_id">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Department</label>
                    <select class="form-control" name="nama_department" id="nama_department" required>
                        <option value="">Pilih Department</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label>Nama Mesin</label>
                    <select class="form-control" name="no_mesin" id="no_mesin" required>
                        <option value="">Pilih Mesin</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnSimpanDeskripsi">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    if (!calendarEl) return;

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'id',
        events: '{{ route("agenda.events") }}',
        eventClick: function(info) {
            if (confirm('Agenda sudah selesai?')) {
                fetch('{{ route("agenda.updateStatus") }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: JSON.stringify({ id: info.event.id, status: 'selesai' })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        info.event.setProp('backgroundColor', 'green');
                        info.event.setProp('borderColor', 'green');
                        info.event.setProp('textColor', 'white');
                        alert('Agenda berhasil ditandai sebagai selesai!');
                        location.reload();
                    } else {
                        alert('Gagal menandai Agenda sebagai selesai.');
                    }
                })
                .catch(error => { console.error('Error:', error); alert('Terjadi kesalahan.'); });
            }
        },
        eventDidMount: function(info) {
            if (info.event.extendedProps.status === 'selesai') {
                info.el.style.backgroundColor = 'green';
                info.el.style.borderColor = 'green';
                info.el.style.color = 'white';
            } else {
                info.el.style.backgroundColor = 'red';
                info.el.style.borderColor = 'red';
                info.el.style.color = 'black';
            }
        },
        dateClick: function(info) {
            var modal = new bootstrap.Modal(document.getElementById('modalDeskripsi'), { keyboard: false });
            document.getElementById('modalTanggal').innerText = info.dateStr;
            document.getElementById('btnSimpanDeskripsi').onclick = function() {
                var lokasi = document.getElementById('lokasi_nama').value;
                var department = document.getElementById('nama_department').value;
                var no_mesin = document.getElementById('no_mesin').value;
                if (no_mesin) {
                    fetch('{{ route("agenda.store") }}', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        body: JSON.stringify({ tanggal: info.dateStr, no_mesin: no_mesin, department: department, lokasi: lokasi })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Agenda berhasil disimpan');
                            modal.hide();
                            calendar.refetchEvents();
                        } else {
                            alert('Terjadi kesalahan: ' + (data.message || 'Unknown error'));
                        }
                    })
                    .catch(error => { console.error('Error:', error); });
                }
            };
            modal.show();
        }
    });
    calendar.render();
});

$(document).ready(function() {
    $('#lokasi_nama').change(function() {
        var lokasi_id = $(this).find(':selected').data('id');
        $('#lokasi_id').val(lokasi_id);
        $.ajax({
            type: 'POST',
            url: '{{ route("department.by-lokasi") }}',
            data: { lokasi_id: lokasi_id, _token: '{{ csrf_token() }}' },
            success: function(response) { $('#nama_department').html(response); }
        });
    });

    $('#lokasi_nama, #nama_department').change(function() {
        var nama_lokasi = $('#lokasi_nama').val();
        var nama_department = $('#nama_department').val();
        if (nama_lokasi && nama_department) {
            $.ajax({
                url: '{{ route("mesin.byLokasiDepartment") }}',
                type: 'POST',
                data: { nama_lokasi: nama_lokasi, nama_department: nama_department, _token: '{{ csrf_token() }}' },
                success: function(data) { $('#no_mesin').html(data); }
            });
        }
    });
});
</script>
@endsection

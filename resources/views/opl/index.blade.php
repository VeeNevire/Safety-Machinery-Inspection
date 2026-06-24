@extends('layouts.admin')

@section('title', 'Data OPL')

@section('content')
<style>
    thead { background-color: blue; color: aliceblue; }
</style>

<div class="page-header">
    <h3 class="font-weight-bold">Data OPL</h3><br>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="search-container" style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 10px;">
                    <input type="text" id="searchInput" style="height: 28px;" onkeyup="searchTable()" placeholder="cari...">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">NO MESIN</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">NAMA MESIN</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">LOKASI</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">DEPARTEMEN</th>
                                <th colspan="3">OPL TERSEDIA</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">KETERANGAN</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">Aksi</th>
                            </tr>
                            <tr style="text-align: center;">
                                <th>Ada</th><th>Tidak ada</th><th>Update</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:white;">
                            @foreach($opl as $row)
                            <tr>
                                <td>{{ $row->no_mesin }}</td>
                                <td>{{ $row->nama_mesin }}</td>
                                <td>{{ $row->nama_lokasi }}</td>
                                <td>{{ $row->nama_department }}</td>
                                <td style="text-align: center;">{{ $row->opl_tersedia == 'ada' ? '✔️' : '' }}</td>
                                <td style="text-align: center;">{{ $row->opl_tersedia == 'tidak ada' ? '✔️' : '' }}</td>
                                <td style="text-align: center;">{{ $row->opl_tersedia == 'update' ? '✔️' : '' }}</td>
                                <td>{{ $row->keterangan_op }}</td>
                                <td style="text-align: center;">
                                    <a title="hapus" class="btn btn-danger" style="font-size: 20px;" href="{{ route('opl.destroy', $row->no_mesin) }}" onclick="event.preventDefault(); if(confirm('Anda yakin akan menghapus data ini?')) document.getElementById('hapus-form-{{ $row->no_mesin }}').submit();"><i class="fa-solid fa-trash-can"></i></a>
                                    <form id="hapus-form-{{ $row->no_mesin }}" action="{{ route('opl.destroy', $row->no_mesin) }}" method="post" style="display: none;">@csrf @method('DELETE')</form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
var currentPage = 1;
var rowsPerPage = 10;
var filteredRows = [];

function displayTablePage(page) {
    var table = document.getElementById("table");
    var tbody = table.getElementsByTagName("tbody")[0];
    var rows = filteredRows.length > 0 ? filteredRows : Array.from(tbody.getElementsByTagName("tr"));
    var totalRows = rows.length;
    var start = (page - 1) * rowsPerPage;
    var end = start + rowsPerPage;
    for (var i = 0; i < totalRows; i++) { rows[i].style.display = (i >= start && i < end) ? "" : "none"; }
    document.getElementById("prevBtn").disabled = page === 1;
    document.getElementById("nextBtn").disabled = end >= totalRows;
    updatePagination(totalRows);
}

function prevPage() { if (currentPage > 1) { currentPage--; displayTablePage(currentPage); } }
function nextPage() {
    var table = document.getElementById("table");
    var tbody = table.getElementsByTagName("tbody")[0];
    var rows = filteredRows.length > 0 ? filteredRows : Array.from(tbody.getElementsByTagName("tr"));
    if (currentPage * rowsPerPage < rows.length) { currentPage++; displayTablePage(currentPage); }
}

function updatePagination(totalRows) {
    var totalPages = Math.ceil(totalRows / rowsPerPage);
    var paginationContainer = document.getElementById('pagination');
    paginationContainer.innerHTML = '';
    var paginationRange = 2;
    var pageButtons = [];
    pageButtons.push(createPageButton(1));
    if (currentPage - paginationRange > 2) { pageButtons.push(createEllipsis()); }
    for (var i = Math.max(2, currentPage - paginationRange); i <= Math.min(totalPages - 1, currentPage + paginationRange); i++) { pageButtons.push(createPageButton(i)); }
    if (currentPage + paginationRange < totalPages - 1) { pageButtons.push(createEllipsis()); }
    pageButtons.push(createPageButton(totalPages));
    pageButtons.forEach(button => paginationContainer.appendChild(button));
}

function createPageButton(page) {
    var button = document.createElement('button');
    button.innerText = page;
    button.classList.add('page-button');
    if (page === currentPage) { button.classList.add('active'); }
    button.onclick = function() { currentPage = page; displayTablePage(currentPage); };
    return button;
}

function createEllipsis() {
    var span = document.createElement('span');
    span.innerText = '...';
    span.style.padding = '8px 16px';
    span.style.margin = '0 4px';
    return span;
}

document.addEventListener("DOMContentLoaded", function() {
    filteredRows = Array.from(document.querySelectorAll('#table tbody tr'));
    displayTablePage(currentPage);
});

function searchTable() {
    var input = document.getElementById("searchInput");
    var filter = input.value.toLowerCase();
    var table = document.getElementById("table");
    var tbody = table.getElementsByTagName("tbody")[0];
    var rows = Array.from(tbody.getElementsByTagName("tr"));
    filteredRows = rows.filter(function(row) {
        var cells = row.getElementsByTagName("td");
        return Array.from(cells).some(function(cell) { return cell.textContent.toLowerCase().includes(filter); });
    });
    rows.forEach(function(row) { row.style.display = 'none'; });
    filteredRows.forEach(function(row) { row.style.display = ''; });
    currentPage = 1;
    displayTablePage(currentPage);
}
</script>

<style>
    .page-button { padding: 8px 16px; background-color: #007bff; color: #fff; border: none; cursor: pointer; border-radius: 4px; margin: 0 4px; font-size: 14px; transition: background-color 0.3s ease; }
    .page-button.active { background-color: #0056b3; }
    .page-button:hover:not(.active) { background-color: #0056b3; }
    #prevBtn, #nextBtn { padding: 8px 16px; background-color: #007bff; color: #fff; border: none; cursor: pointer; border-radius: 4px; margin: 0 4px; font-size: 14px; }
    #prevBtn:disabled, #nextBtn:disabled { background-color: #cccccc; cursor: not-allowed; }
</style>
<div class="pagination-container" style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 10px;">
    <button onclick="prevPage()" id="prevBtn">Previous</button>
    <div id="pagination"></div>
    <button onclick="nextPage()" id="nextBtn">Next</button>
</div>
@endsection

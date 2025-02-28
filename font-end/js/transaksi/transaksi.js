const myTable = document.getElementById("display-transaksi");
const myForm = document.getElementById("form-transaksi");

// Active menu Responsive
document.querySelector('.nav-toggle').addEventListener('click', function () {
    document.querySelector('.menu').classList.toggle('active');
});

$(document).ready(function() {
    loadBarang();
    loadTransaksi();

    $("#addTransaksi").click(function() {
        myTable.style.display = "none";
        myForm.style.display = "block"; 
    });

    $("#transaksiForm").submit(function(e) {
        e.preventDefault();
        let id_barang = $("#id_barang").val();
        let jumlah = $("#jumlah").val();

        $.post("http://localhost/api/minimarket/transaksi/create_transaksi.php", { id_barang, jumlah }, function(response) {
            if (response === "success") {
                $("#transaksiForm")[0].reset();
                loadTransaksi();
            } else if (response === "barang_not_found") {
                alert("Barang tidak ditemukan!");
            } else {
                alert("Gagal menambahkan transaksi!");
            }
        });
    });

    function loadBarang() {
        $.getJSON("http://localhost/api/minimarket/barang/read.php", function(data) {
            let options = '<option value="">Pilih Barang</option>';
            data.forEach(item => {
                options += `<option value="${item.id_barang}">${item.nama_barang}</option>`;
            });
            $("#id_barang").html(options);
        });
    }

    function loadTransaksi() {
        myTable.style.display = "block";
        myForm.style.display = "none";
        $.getJSON("http://localhost/api/minimarket/transaksi/read_transaksi.php", function(data) {
            let rows = "";
            data.forEach(item => {
                rows += `<tr>
                    <td>${item.nama_barang}</td>
                    <td>${item.jumlah}</td>
                    <td>${item.total_harga}</td>
                    <td>${item.tanggal_transaksi}</td>
                    <td>
                        <button 
                            class="btn btn-delete" 
                            onclick="deleteTransaksi(${item.id_transaksi})">
                            <i class="fas fa-trash"> </i>
                        </button>
                    </td>
                </tr>`;
            });
            $("#transaksiTable").html(rows);
        });
    }

    window.deleteTransaksi = function(id_transaksi) {
        if (confirm("Yakin ingin menghapus transaksi?")) {
            $.post("http://localhost/api/minimarket/transaksi/delete_transaksi.php", { id_transaksi }, function(response) {
                if (response === "success") {
                    loadTransaksi();
                } else {
                    alert("Gagal menghapus transaksi!");
                }
            });
        }
    };
});

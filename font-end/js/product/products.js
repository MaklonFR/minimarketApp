const myTable = document.getElementById("display-barang");
const myEdit = document.getElementById("form-barang");
const myJudul = document.getElementById("judul");

// Active menu Responsive
document.querySelector('.nav-toggle').addEventListener('click', function () {
    document.querySelector('.menu').classList.toggle('active');
});

$(document).ready(function() {
    loadData();

    $("#addBarang").click(function() {
        myTable.style.display = "none";
        myEdit.style.display = "block";
        myJudul.innerHTML ="Tambah Barang" ; 
    });

    $("#barangForm").submit(function(e) {
        e.preventDefault();
        let id_barang = $("#id_barang").val();
        let nama_barang = $("#nama_barang").val();
        let kategori = $("#kategori").val();
        let harga = $("#harga").val();
        let stok = $("#stok").val();
        let diskon = $("#diskon").val();

        let url = id_barang ? "http://localhost/api/minimarket/barang/update.php" : "http://localhost/api/minimarket/barang/create.php";
        
        $.post(url, { id_barang, nama_barang, kategori, harga, stok, diskon }, function(response) {
            if (response === "success") {
                alert("Data tersimpan!")
                $("#barangForm")[0].reset();
                $("#id_barang").val("");
                loadData();
            } else {
                alert("Gagal menyimpan data");
            }
        });
    });

    function loadData() {
        myTable.style.display = "block";
        myEdit.style.display = "none";
        $.getJSON("http://localhost/api/minimarket/barang/read.php", function(data) {
            console.log(data);
            let rows = "";
            data.forEach(item => {
                rows += `<tr>
                    <td>${item.nama_barang}</td>
                    <td>${item.kategori}</td>
                    <td>${item.harga}</td>
                    <td>${item.stok}</td>
                    <td>${item.diskon}</td>
                    <td>
                        <button
                            title="Edit" 
                            class="btn btn-edit"   
                            onclick='editData(${JSON.stringify(item)})'>
                            <i class="fas fa-edit"></i>
                        </button>
                        <button 
                            title="Delete" 
                            class="btn btn-delete" 
                            onclick='deleteData(${item.id_barang})'>
                            <i class="fas fa-trash"> </i>
                        </button>
                    </td>
                </tr>`;
            });
            $("#barangTable").html(rows);
        });
    }

    window.editData = function(item) {
        myTable.style.display = "none";
        myEdit.style.display = "block";
        myJudul.innerHTML ="Update Barang" ;

        $("#id_barang").val(item.id_barang);
        $("#nama_barang").val(item.nama_barang);
        $("#kategori").val(item.kategori);
        $("#harga").val(item.harga);
        $("#stok").val(item.stok);
        $("#diskon").val(item.diskon);
    };

    window.deleteData = function(id_barang) {
        if (confirm("Yakin ingin menghapus?")) {
            $.post("http://localhost/api/minimarket/barang/delete.php", { id_barang }, function(response) {
                if (response === "success") {
                    loadData();
                } else {
                    alert("Gagal menghapus data");
                }
            });
        }
    };
});

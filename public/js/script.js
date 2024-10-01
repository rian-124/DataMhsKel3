
    function confirmDelete(id) {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Data ini akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan ke URL penghapusan
                window.location.href = 'http://localhost/phpmvc/public/mahasiswa/delete/' + id;
            }
        });
    }



$(function () {


    
    $('.tambahDataMahasiswa').on('click', function() {
        $('#staticBackdropLabel').html('Tambah Data mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah')

        // Bersihkan input form ketika klick ubah kemudian kembali klick tambah data

        $('#username').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');

        // ubah action form kembali ke 'tambah', 

        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/tambah');
    });


    $('.tampilModalUbah').on('click', function() {
        
        $('#staticBackdropLabel').html('Ubah data mahasiswa');
        $('.modal-footer button[type=submit]').html('ubah');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/Ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getUbah',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#username').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        })


    });

});

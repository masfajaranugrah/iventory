$('.confirm-delete').click(function(event) {

    const deleteUrl = $(this).attr('href'); // Ambil URL dari tautan "Hapus"
    event.preventDefault();
    Swal.fire({
        title: 'Apakah Anda yakin mau delete ini?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, delete ini!',
        cancelButtonText: 'Batal',
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
          .then(() => {
            window.location = deleteUrl;
          })
        }
      })

    });

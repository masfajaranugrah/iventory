$(document).ready(function() {
    new DataTable('#data', {
        searching: false,
        pagingType: "simple_numbers",
        lengthMenu: [
            [5, 10, 20, -1],
            [5, 10, 20, 'All']
        ],
    });
});

new DataTable('#data-tables', {
    "pagingType": "simple_numbers",
    lengthMenu: [
          [5, 10, 20, -1],
          [5, 10, 20, 'All']
      ]
  });

function clearFormFields() {
    document.getElementById('myForm').reset();
}


function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (passwordInput && icon) {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    } else {
        console.error('Element with ID not found');
    }
}


  // Menampilkan preloader saat dokumen dimuat
  $(document).ready(function() {
    $(".preloader").show();
  });

  // Menyembunyikan preloader setelah proses pemuatan selesai
  $(window).on("load", function() {
    $(".preloader").fadeOut("slow", function() {
      // Setelah preloader selesai, tampilkan kembali elemen main-wrapper
      $(".main-wrapper").show();
      $(".main-sidebar").show();
    });
  });

    // Menghilangkan pesan alert setelah 3 menit
setTimeout(function() {
        let successAlert = document.getElementById('alert');
        if (successAlert) {
          successAlert.style.display = 'none';
        }
      }, 3000); // 3000 milidetik

function submitForm() {
        var form = document.getElementById('userForm');

        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json();
        })
        .then(data => {
            // Handle success (if needed)
            $('#myModal').modal('hide'); // Close the modal on success
        })
        .catch(error => {
            if (error.message === 'Unprocessable Entity') {
                // If validation error, display errors and keep modal open
                fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(errors => {
                    Object.keys(errors.errors).forEach(key => {
                        var inputField = $('#' + key);
                        inputField.addClass('is-invalid');
                        inputField.next('.invalid-feedback').html(errors.errors[key][0]);
                    });
                })
                .catch(error => {
                    console.error(error);
                });
            } else {
                // Handle other types of errors (e.g., server errors)
                console.error(error);
            }
        });
    }

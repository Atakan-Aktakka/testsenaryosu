$(document).ready(function() {
    // Kullanıcıları yükle
    function loadUsers() {
        $.ajax({
            url: '../src/list_users.php',  
            type: 'GET',
            success: function(response) {
                const users = JSON.parse(response);
                let rows = '';
                users.forEach(user => {
                    rows += `
                        <tr>
                            <td>${user.id}</td>
                            <td>${user.ad}</td>
                            <td>${user.soyad}</td>
                            <td>${user.telefon}</td>
                            <td>${user.email}</td>
                            <td>${user.username}</td>
                            <td>
                                <button class="btn btn-warning btn-sm editUserBtn" data-id="${user.id}" data-bs-toggle="modal" data-bs-target="#editUserModal">Düzenle</button>
                                <button class="btn btn-danger btn-sm deleteUserBtn" data-id="${user.id}">Sil</button>
                            </td>
                        </tr>
                    `;
                });
                $('#userTableBody').html(rows);
            }
        });
    }
    loadUsers();

    // Yeni kullanıcı ekleme formu
    $('#addUserForm').submit(function (e) {
        e.preventDefault();
    
        const formData = $(this).serialize();
        console.log("Gönderilen Form Verileri: ", formData); 
    
        $.ajax({
            url: '../src/add_user.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                console.log("Sunucudan Gelen Yanıt: ", response); 
                alert(response.message);
                if (response.success) {
                    $('#addUserModal').modal('hide');
                    loadUsers();
                }
            },
            error: function (xhr, status, error) {
                console.error("Hata: ", error);
                alert('Kullanıcı eklenirken bir hata oluştu!');
            }
        });
    });
    
    
    

    $(document).on('click', '.editUserBtn', function() {
        const userId = $(this).data('id');
        $.ajax({
            url: '../src/get_user.php',
            type: 'GET',
            data: { id: userId },
            success: function(response) {
                try {
                    const user = JSON.parse(response);
                    console.log(user);
                    $('#editAd').val(user.ad);
                    $('#editSoyad').val(user.soyad);
                    $('#editTelefon').val(user.telefon);
                    $('#editEmail').val(user.email);
                    $('#editUserId').val(user.id);
                    $('#editUsername').val(user.username);
                } catch (e) {
                    console.error("Error parsing JSON: ", e);
                    alert('Kullanıcı bilgilerini yüklerken bir hata oluştu!');
                }
            },
            error: function() {
                alert('Kullanıcı bilgileri yüklenirken bir hata oluştu!');
            }
        });
    });
    
    $('#editUserForm').submit(function (e) {
        e.preventDefault();
    
        $.ajax({
            url: '../src/edit_user.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json', 
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    $('#editUserModal').modal('hide');
                    loadUsers();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error Response: ", xhr.responseText);
                alert('Beklenmeyen bir hata oluştu!');
            }
            ,
        });
    });
    
    

    // Kullanıcı silme işlemi
    $(document).on('click', '.deleteUserBtn', function() {
        const userId = $(this).data('id');
        if (confirm('Bu kullanıcıyı silmek istediğinizden emin misiniz?')) {
            $.ajax({
                url: '../src/delete_user.php',
                type: 'POST',
                data: { id: userId },
                success: function(response) {
                    const res = JSON.parse(response);
                    alert(res.message);
                    if (res.success) {
                        loadUsers();
                    }
                }
            });
        }
    });
});

$(document).ready(function () {
    $('#loginForm').submit(function (e) {
        e.preventDefault();

        const formData = $(this).serialize();

        $.ajax({
            url: '../src/login.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    window.location.href = 'dashboard.php';
                } else {
                    $('#loginError').removeClass('d-none').text(response.message);
                }
            },
            error: function () {
                alert('Bir hata oluştu!');
            }
        });
    });
});



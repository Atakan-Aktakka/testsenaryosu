<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Yönetimi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Kullanıcı Yönetimi</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">Yeni Kullanıcı Ekle</button>
        </div>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>Telefon</th>
                    <th>E-posta</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                
            </tbody>
        </table>
    </div>

   
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Yeni Kullanıcı Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="ad" class="form-label">Ad</label>
                            <input type="text" class="form-control" id="ad" name="ad" required>
                        </div>
                        <div class="mb-3">
                            <label for="soyad" class="form-label">Soyad</label>
                            <input type="text" class="form-control" id="soyad" name="soyad" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefon" class="form-label">Telefon</label>
                            <input type="text" class="form-control" id="telefon" name="telefon" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Kullanıcı Adı</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="sifre" class="form-label">Şifre</label>
                            <input type="password" class="form-control" id="sifre" name="sifre" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Kullanıcıyı Düzenle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm">
                        <input type="hidden" id="editUserId" name="id">
                        <div class="mb-3">
                            <label for="editAd" class="form-label">Ad</label>
                            <input type="text" class="form-control" id="editAd" name="ad" required>
                        </div>
                        <div class="mb-3">
                            <label for="editSoyad" class="form-label">Soyad</label>
                            <input type="text" class="form-control" id="editSoyad" name="soyad" required>
                        </div>
                        <div class="mb-3">
                            <label for="editTelefon" class="form-label">Telefon</label>
                            <input type="text" class="form-control" id="editTelefon" name="telefon" required>
                        </div>
                        <div class="mb-3">
                            <label for="editUsername" class="form-label">Kullanıcı Adı</label>
                            <input type="text" class="form-control" id="editUsername" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">E-posta</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/main.js"></script>
</body>
</html>
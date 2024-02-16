@section('pengaturan')
    <div class="content-wrapper">
        <div class=" stretch-card">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Pengaturan</h3>

                </div>
            </div>
        </div>
        <div class=" stretch-card mt-3">
            <div class="card">
                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                <div class="card-body ">
                    <a class="text-decoration-none text-dark" data-bs-toggle="collapse" href="#collapse_change_password"
                        aria-expanded="false" aria-controls="collapseExample" id="changePasswordLink">
                        <div class="w-100">
                            <div class="row ">
                                <div class="col-11 ">
                                    <p>
                                        Ubah Kata Sandi
                                    </p>
                                </div>
                                <div class="col-1">
                                    <i class="ti-angle-right menu-icon"></i>
                                    <i class="ti-angle-down menu-icon d-none"></i>

                                </div>

                            </div>
                        </div>
                    </a>
                    <div class="collapse" id="collapse_change_password">
                        <form id="changePasswordForm" action="{{ route('change.password') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="currentPassword">Kata Sandi Saat Ini</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="newPassword">Kata Sandi Baru (Kombinasi minimal 1 huruf kapital dan 1 angka)</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="reNewPassword">Masukkan Ulang Kata Sandi Baru</label>
                                <input type="password" class="form-control" id="reNewPassword" name="reNewPassword" required>
                            </div>
                            <button type="submit" class="btn bg-primary" id="changePasswordSubmit" disabled>Simpan Perubahan</button>
                        </form>
                        
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var newPassword = document.getElementById('newPassword');
                                var reNewPassword = document.getElementById('reNewPassword');
                                var submitButton = document.getElementById('changePasswordSubmit');
                        
                                function validatePassword() {
                                    var newPasswordValue = newPassword.value;
                                    var reNewPasswordValue = reNewPassword.value;
                        
                                    if (newPasswordValue.length >= 1 && /\d/.test(newPasswordValue) && /[A-Z]/.test(newPasswordValue)) {
                                        // Password is valid
                                        reNewPassword.setCustomValidity(newPasswordValue === reNewPasswordValue ? '' : 'Kata sandi tidak cocok');
                                    } else {
                                        // Password is not valid
                                        reNewPassword.setCustomValidity('Kombinasi minimal 1 huruf kapital dan 1 angka diperlukan');
                                    }
                        
                                    submitButton.disabled = !document.getElementById('changePasswordForm').checkValidity();
                                }
                        
                                newPassword.addEventListener('input', validatePassword);
                                reNewPassword.addEventListener('input', validatePassword);
                            });
                        </script>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

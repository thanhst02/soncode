<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="{{ asset('libbackend/assets/global/images/favicon.png') }}" type="image/png">
    @includeif('backend.layouts.header-link')
    <style type="text/css">
        .full-height {
            height: 99vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .content {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="row flex-center full-height">
        <div class="content col-sm-6" >
            <div class="panel panel-default ">
                <div class="panel-header bg-dark">
                    <h1 class="flex-center" style="padding: 5px 0px">Đăng ký thành viên</h1>
                </div>
                <div class="panel-body bg-white">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::open(['method' => 'POST', 'route' => 'account.signup-post', 'class' => 'form-validation', 'role' => 'form']) !!}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label required">Tên đăng nhập</label>
                                            <div class="append-icon">
                                                <input type="text" name="username" class="form-control" minlength="3" maxlength="255" placeholder="Tối thiểu 3 ký tự..."  required value="{{ old('username') }}">
                                                <i class="icon-envelope"></i>
                                                <div class="form-error valid">{{ $errors->first('username') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label required">Tên đầy đủ</label>
                                            <div class="append-icon">
                                                <input type="text" name="name" class="form-control" minlength="3" maxlength="55" placeholder="Tối thiểu 3 ký tự..." required value="{{ old('name') }}">
                                                <i class="icon-user"></i>
                                                <div class="form-error valid">{{ $errors->first('name') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label required">Địa chỉ email</label>
                                            <div class="append-icon">
                                                <input type="email" name="email" class="form-control" minlength="3" maxlength="255"  placeholder="Nhập email..." required value="{{ old('email') }}">
                                                <i class="icon-envelope"></i>
                                                <div class="form-error valid">{{ $errors->first('email') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label required">Số điện thoại</label>
                                            <div class="append-icon">
                                                <input type="text" name="mobile" class="form-control" placeholder="Nhập số điện thoại..."required value="{{ old('mobile') }}">
                                                <i class="icon-screen-smartphone"></i>
                                                <div class="form-error valid">{{ $errors->first('mobile') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label required">Mật khẩu</label>
                                            <div class="append-icon">
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu trong khoảng 4 đến 25 ký tự" minlength="4" maxlength="25" required>
                                                <i class="icon-lock"></i>
                                                <div class="form-error valid">{{ $errors->first('password') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label required">Nhập lại Mật khẩu</label>
                                            <div class="append-icon">
                                                <input type="password" name="password2" id="password2" class="form-control" placeholder="Nhập lại mật khẩu..." minlength="4" maxlength="25" required >
                                                <i class="icon-lock"></i>
                                                <div class="form-error valid">{{ $errors->first('password2') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            {!! Form::label('address', 'Nhập địa chỉ') !!}
                                            {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
                                            <small class="text-danger">{{ $errors->first('address') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Tải lên ảnh đại diện</label>
                                            <div class="file">
                                                <div class="option-group">
                                                    <span class="file-button btn-primary">Chọn file ảnh</span>
                                                    <input type="file" class="custom-file" name="avatar" id="avatar" onchange="document.getElementById('uploader').value = this.value;">
                                                    <input type="text" class="form-control" id="uploader" placeholder="chưa chọn file..." readonly="">
                                                </div>
                                                <div class="form-error valid">{{ $errors->first('avatar') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Bạn đồng ý với điều khoản dịch vụ?</label>
                                            <div class="option-group">
                                                <div class="checkbox checkbox-primary">
                                                    <label>
                                                        <input type="checkbox" name="terms" id="terms" class="md-checkbox" required/>
                                                        Tôi đồng ý với các điều khoản và điều kiện
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-error valid">{{ $errors->first('terms') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center  m-t-20">
                                    {!! Form::submit("Sign In", ['class' => 'btn btn-embossed btn-primary']) !!}
                                    {!! Form::reset("Cancel", ['class' => 'cancel btn btn-embossed btn-default m-b-10 m-r-0']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @includeif('backend.layouts.footer-js')
    {{-- <script src="{{ asset('libbackend/assets/global/plugins/jquery-validation/jquery.validate.js') }}"></script> <!-- Form Validation -->
    <script src="{{ asset('libbackend/assets/global/plugins/jquery-validation/additional-methods.js') }}"></script> <!-- Form Validation Additional Methods - OPTIONAL --> --}}
    <script src="{{ asset('libbackend/assets/admin/md-layout1/material-design/js/material.js') }}"></script>
    <script>
        $.material.init();
    </script>
</body>
</html>
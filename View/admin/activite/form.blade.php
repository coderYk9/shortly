@if(isset($_SESSION['msg']))
<div class="alert alert-info">{{ $_SESSION['msg'] }}</div>
@endif
<div class="row">
    <div class="col-sm-6">
        <div class="form-group has-feedback ">
            <label for="first_name">name</label>
            <input type="text" name="name" class="form-control" id="first_name" placeholder="First name" value="">
            @if(isset($_SESSION['error']))
            <div class="help-block">{{ $_SESSION['message'] }}</div>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group has-feedback has-error ">
            <label for="user_name">User name</label>
            <input type="text" name="username" class="form-control" id="user_name" placeholder="User name" />


        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group has-feedback has-error ">
            <label for="user_name">Password Confrmation</label>
            <input type="password" name="passwordconf" class="form-control" id="conf" placeholder="passwordconf" />


        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group has-feedback">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">


        </div>
    </div>
</div>

<form method="post" action="" name="login_form" id="login_form" onSubmit="return ValidateForm();">
    <table>
        <tbody>
        <tr>
            <td><label class="required" for="email">Email</label></td>
            <td>
                <input type="text" name="email" id="login_email" value="" class="txt" /></td>
        </tr>
        <tr>
            <td><label class="required" for="password">Password</label></td>
            <td>
                <input type="password" name="password" id="login_password" value="" class="txt" /></td>
        </tr>

        <tr>
            <td id="type-label"><label class="required" for="type">Language</label></td>
            <td>
                <select name="lang" id="lang">
                    <option value="en" selected="selected">English</option>
                </select></td>
        </tr>

        <tr>
            <td colspan="2" class="tar">
                    <span class="but">
                        <button type="button" onclick="window.location = '/auth/remind'; return false;">?</button>
                    </span>
                    <span class="but">
                        <button type="submit">Login</button>
                    </span>
            </td>
        </tr>
        </tbody>
    </table>
</form>



<script type="text/javascript">

    function echeck(str) {
        var err = "Please enter a valid email address";
        var at="@"
        var dot="."
        var lat=str.indexOf(at)
        var lstr=str.length
        var ldot=str.indexOf(dot)
        if (str.indexOf(at)==-1){
            alert(err)
            return false
        }

        if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
            alert(err)
            return false
        }

        if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
            alert(err)
            return false
        }

        if (str.indexOf(at,(lat+1))!=-1){
            alert(err)
            return false
        }

        if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
            alert(err)
            return false
        }

        if (str.indexOf(dot,(lat+2))==-1){
            alert(err)
            return false
        }

        if (str.indexOf(" ")!=-1){
            alert(err)
            return false
        }

        return true
    }

    function ValidateForm(){
        var emailID=document.login_form.email
        var ps=document.login_form.password

        if ((emailID.value==null)||(emailID.value=="")){
            alert("Please enter email address");
            emailID.focus();
            return false
        }
        if (echeck(emailID.value)==false){
            emailID.focus();
            return false
        }
        if (ps.value==''){
            ps.focus();
            alert("Please enter password");
            return false
        }
        return true
    }
</script>

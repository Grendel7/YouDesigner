
<div class="block blck2">
    <h2 class="head icon-5"><span>Create a New E-mail Account</span></h2>

    <form action="/emails/manage" method="post">
        <table class="type-3">
            <tr class="top">
                <td>E-mail:</td>
                <td>
                    <input type="text" name="name" id="name" value="" /></td>
                <td>@example.com</td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" id="password" value="" /></td>
                <td><input type="button" class="generate" value="Generate Password" /></td>
            </tr>
            <!--
            <tr>
                <td>&nbsp;</td>
                <td class="password"><div>&nbsp;</div>Very weak (0/100)</td>
                <td>&nbsp;</td>
            </tr>
            -->
            <tr>
                <td>Verify password:</td>
                <td>
                    <input type="password" name="password_confirm" id="password_confirm" value="" /></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Mailbox quota: </td>
                <td>
                    <input type="text" name="quota" id="quota" value="Unlimited" /></td>
                <td>&nbsp;</td>
            </tr>
            <tr class="bot">
                <td colspan="3">

                    <input type="submit" name="submit" id="submit" value="Create" />                </td>
            </tr>
        </table>
    </form>
</div>


<div class="block">
    <h2 class="head icon-6"><span>Manage E-mail Accounts</span></h2>

    <table class="type-5">
        <tr class="head">
            <td class="t5-left">Account</td>
            <td>Access Webmail</td>
            <td>Usage, MB</td>
            <td>Quota, MB</td>
            <td>Actions</td>
        </tr>

        <tr>
            <td colspan="5">
                You do not have any e-mail accounts created                </td>
        </tr>

    </table>

</div>
    
<div class="block" style="padding: 0px 0px 10px 0px;">
    <div class="find">
        <div class="head" style="margin: 0;">Find</div>
        <table>
            <tr>
                <td>
                    <input id="findInput" type="text" value="Type section name..." />
                    <div id="clear_findInput"><img src="http://cpanel.main-hosting.com/themes/x2/images/input-clear.png" height="13" width="13" /></div>
                    <div class="clear"></div>
                </td>
            </tr>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var findInput = $("#findInput");

        var menuItems = $("ul.nav-left ul a");
        var onlyChild;
        var searchPhrase = '';
        var n = 0;
        var c = 0;
        var text = '';

        if( findInput.val() == 'Type section name...'){
            findInput.val('');
        }

        findInput.focus();
        findInput.live("keyup", update_search_results);

        function update_search_results(){
            if(findInput.val() == 'Type section name...'){
                searchPhrase = '';
            }
            if(searchPhrase != findInput.val()){
                searchPhrase = findInput.val().toLowerCase();
                if(findInput.val() == 'Type section name...'){
                    searchPhrase = '';
                }
                // items
                n=0;
                while(menuItems.length > n){
                    text = $(menuItems[n]).text().toLowerCase();
                    if(text.search(searchPhrase) >= 0){
                        if($(menuItems[n]).closest('ul').closest('li').length > 0){
                            $(menuItems[n]).parent('li').show();
                        }
                        $(menuItems[n]).show();
                    } else {
                        $(menuItems[n]).hide();
                        if($(menuItems[n]).closest('ul').closest('li').length > 0){
                            $(menuItems[n]).parent('li').hide();
                        }
                    }
                    n++;
                }
            }
        }

        findInput.bind('click focus',function(){
            if(findInput.val() == 'Type section name...'){
                findInput.val('');
            }
        });

        findInput.blur(function(){
            if(findInput.val() == ''){
                findInput.val('Type section name...');
            }
        });

        findInput.bind('keyup blur', function() {
            if(this.value == 'Type section name...'){
                $('#clear_findInput').hide();
                update_search_results();
            } else if(this.value == '') {
                $('#clear_findInput').hide();
                update_search_results();
            } else {
                $('#clear_findInput').show();
            }
        });

        $("#clear_findInput").bind('click', function(){
            findInput.val('Type section name...');
            $(this).hide();
            update_search_results();
        });

    });
</script>

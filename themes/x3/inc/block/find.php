<div class="find">
    <div class="head">Find</div>
    <table>
        <tr>
            <td>
                <input id="findInput" type="text" value="Type section name..." />
                <div id="clear_findInput">
                    <img src="themes/x2/images/input-clear.png" height="13" width="13" /></div>
                <div class="clear"></div>
            </td>
        </tr>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var findInput = $("#findInput");
        var divList = $("div.list");
        var divListChilds;
        var searchPhrase = '';
        var n = 0;
        var c = 0;
        var countVisible = 0;
        var text = '';

        if( findInput.val() == 'Type section name...'){
            findInput.val('');
        }

        findInput.focus();
        findInput.live("keyup", update_search_results);

        function update_search_results(){
//            console.log('starting search');
            if(findInput.val() == 'Type section name...'){
                searchPhrase = '';
            }
            if(searchPhrase != findInput.val()){
                searchPhrase = findInput.val().toLowerCase();
                if(findInput.val() == 'Type section name...'){
                    searchPhrase = '';
                }
//                console.log('searching for '+searchPhrase);
                // items
                n=0;
                while(divList.length > n){
                    divListChilds = $(divList[n]).children();
                    c = 1;
                    countVisible = divListChilds.length;
                    while(divListChilds.length > c){
                        text = $($(divListChilds[c]).children()).children().text().toLowerCase();
                        if(text.search(searchPhrase) >= 0){
                            $(divListChilds[c]).css('display', 'block');
                        } else {
                            $(divListChilds[c]).css('display', 'none');
                            countVisible--;
                        }
                        c++;
                    }
                    if(countVisible > 1){
                        $(divList[n]).css('display', 'block');
                    } else {
                        $(divList[n]).css('display', 'none');
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

<!-- Modal -->
<div class="modal fade myshare" id="myshare" role="dialog">
    <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="" class="close btn" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{Lang::get('app.share_peppypals')}}</h4>
            <p>{{Lang::get('app.help_more_kids_with_eq')}}</p>
            </div>

            <div class="modal-body center">
                <div id="share"></div>
                <script>
                $("#share").jsSocials({
                shares: ["facebook", "twitter", "googleplus", "pinterest", "email"],
                });
                </script>
            </div>
        </div>

    </div>
</div>


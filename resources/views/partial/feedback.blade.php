<!-- modal feedback -->
<div class="modal fade myfeedback" id="myfeedback" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close btn" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">
            <h1>{{Lang::get('app.your_opinion_is_important')}}</h1>
             <p>{{Lang::get('app.please_share_your_ideas_and_thoughts')}}</p>
              <form role="form" method="post" action="{{ url('/feedback') }}">
              <input type="hidden" name="fullname" id="fullname" value="{{ Auth::user()->getNameOremail() }}">
              <input type="hidden" name="email" id="email" value="{{ Auth::user()->getEmail() }}">
              <textarea id="feedBack-area"  name="massages" id="massages" placeholder="{{Lang::get('app.your_thoughts')}}"></textarea>
              <div class="center">
              <button type="submit" class="btn btn-default send">{{Lang::get('app.send')}}</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              </div>
            </form>
          </div>
        </div>
    </div>
</div>
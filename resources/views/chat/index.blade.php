@extends('layouts.app')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
  .card{
    width:80%;
    border-radius: 3px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br/>
  @endif
</div>


<content class="container">
  <!-- minified snippet to load TalkJS without delaying your page -->
<script>
(function(t,a,l,k,j,s){
s=a.createElement('script');s.async=1;s.src="https://cdn.talkjs.com/talk.js";a.head.appendChild(s)
;k=t.Promise;t.Talk={v:3,ready:{then:function(f){if(k)return new k(function(r,e){l.push([f,r,e])});l
.push([f])},catch:function(){return k&&new k()},c:l}};})(window,document,[]);
</script>

<!-- container element in which TalkJS will display a chat UI -->
<div id="talkjs-container" style="width: 90%; margin: 30px; height: 500px">
  <i>Loading chat...</i>
</div>
  </content>
<script>
    Talk.ready.then(function () {
  var me = new Talk.User({
    id: '{{Auth::user()->id}}',
    name: '{{Auth::user()->name}}',
    email: '{{Auth::user()->email}}',
  });
  window.talkSession = new Talk.Session({
    appId: 'tm57HdEP',
    me: me,
  });
  var chatid='{{$id}}';
  if(chatid!=''){
    var other = new Talk.User({
        id: '{{$id}}',
        name: '{{$profile->name}}',
        email: '{{$profile->email}}',
    });

    var conversation = talkSession.getOrCreateConversation(
        Talk.oneOnOneId(me, other)
    );
    conversation.setParticipant(me);
    conversation.setParticipant(other);
  }
  

  var inbox = talkSession.createInbox({ selected: conversation });
  inbox.mount(document.getElementById('talkjs-container'));
});
</script>
@endsection
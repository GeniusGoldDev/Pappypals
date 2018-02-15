<style type="text/css">
  .adminpanel{
    position: relative;
    padding: 20px 0;
  }
  nav.left-menu ul{
    margin: 0;
    padding: 0;
  }
  nav.left-menu ul li {
    list-style-type: none;
   
    margin-bottom: 10px;

  }
  nav.left-menu ul li a{
    padding: 4% 2%;
    display: block;
    text-align: center;
    text-decoration: none;
    color: #fff;
    font-weight: bold;
     background: #f00268;
  }
  nav.left-menu .dropdown ul{
    display: none;
    margin-top: 10px;
  }
  nav.left-menu .dropdown ul li{
    margin-left: 20px;
  }

</style>

<nav class="left-menu">
  <ul>
    <li><a href="/admin">Hem</a></li>
    <li id="dropdown" class="dropdown"><a href="#">Grownups</a>
      <ul class="dropdown_menu">
        <li><a href="/admin/start">Start</a></li>
        <li><a href="/playTogether/create">PlayTogether</a></li>
        <li><a href="/activities/create">Activities</a></li>
        <li><a href="/articles/create">Articles</a></li>
        <li><a href="/eq/create">Eq</a></li>
      </ul>
    </li>
    <li><a href="/admin/faq">faq</a></li>
    <li><a href="/admin/settings">Settings</a></li>
  </ul>
</nav>
<script type="text/javascript">
  $('#dropdown').on('click', function(){
    $('.dropdown_menu').toggle();
  });
</script>
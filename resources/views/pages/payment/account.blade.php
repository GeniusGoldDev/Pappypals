
@extends('share.default')
@section('title', 'account')
@section('id', 'account')
@section('content')
@include('partial.home_header')
<div class="container pull-down grownUps_body">
 
     <div class="col-md-12">
      <div class="col-xs-12 col-sm-12 col-md-12 card  marginlast swe">
          <div class="col-xs-12 col-sm-12  col-md-4 card-image">
            <img src="{{ URL::asset('img/Peppy_Family_Happy.jpg') }}">
          </div>
          <div class="col-xs-12 col-sm-12  col-md-8 card_content index" style="padding:0 33px;">   
            <h3 style="color: #333; font-weight: bold;" >Filmer du kan titta på tillsammans med ditt barn</h3>
            <p>
              Peppy Pals värld är fylld med lättsamma och lekfulla aktiviteter för att skapa kvalitetstid mellan dig och ditt barn.
              I menyn ovan hittar du bland annat “Se film ihop”. Där finns korta filmer med inspirerande frågor att prata om, 
              rollspel att göra samt diplom och färgläggningsbilder att skriva ut.
            </p>
            <button style="float: right;" onclick="window.location.href='{{ url('/playTogether') }}'" class="btn-transparent btn-pink border">Till filmerna</button>       
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 card  marginlast eng">
          <div class="col-xs-12 col-sm-12  col-md-4 card-image">
            <img src="{{ URL::asset('img/Peppy_Family_Happy.jpg') }}">
          </div>
          <div class="col-xs-12 col-sm-12  col-md-8 card_content index" style="padding:0 33px;">   
            <h3 style="color: #333; font-weight: bold;" >Movies you can watch together with your child</h3>
            <p>The Peppy Pals world is filled with easy-going and playful activities meant to inspire quality time between you and your child. In the menu above you will find the link “Watch.” There you will find short movies with inspiring questions to discuss, role-playing games, and even diplomas and coloring pages to print out at home. 
            </p>
            <button style="float: right;" onclick="window.location.href='{{ url('/playTogether') }}'" class="btn-transparent btn-pink border">Explore the movies</button>       
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 card marginlast swe">
          <div class="col-xs-12 col-sm-12 col-md-4 card-image">
            <img src="{{ URL::asset('img/PP_viaplay_treatment.png') }}">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-8 card_content index" style="padding:0 33px;">   
            <h3 style="color: #333; font-weight: bold;">Ladda ner vår app gratis till ditt barn</h3>

  <p>Låt ditt barn utforska Peppy Pals i lugn och ro och lära sig om vänskap, känslor, samarbete samt förståelse för olikheter. Ditt barn får nya digitala kompisar, nämligen hästen Sammy, hunden Reggy, kaninen Gabby, ugglan Izzy och katten Kelly med deras olika personligheter. Tillsammans ger de sig ut på olika spännande äventyr.</p>
            <button onclick="#" class="extarn btn-transparent btn-pink border">iOS</button>
            <button onclick="#" class="extarn btn-transparent btn-pink border">Google Play</button>
            <button onclick="#" class="extarn btn-transparent btn-pink border">Amazon</button>
            <button onclick="#" class="extarn btn-transparent btn-pink border">Web</button>        
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 card marginlast eng">
          <div class="col-xs-12 col-sm-12 col-md-4 card-image">
            <img src="{{ URL::asset('img/PP_viaplay_treatment.png') }}">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-8 card_content index" style="padding:0 33px;">   
            <h3 style="color: #333; font-weight: bold;">Download our app for children for free</h3>

  <p>Let your child explore Peppy Pals and learn about friendship, emotions, cooperation, and accepting differences. Your child will make new digital friends, including Sammy the horse, Reggy the dog, Gabby the rabbit, Izzy the owl and Kelly the cat, with their different personalities. Together they will go out on different exciting adventures.</p>
            <button onclick="#" class="extarn btn-transparent btn-pink border">iOS</button>
            <button onclick="#" class="extarn btn-transparent btn-pink border">Google Play</button>
            <button onclick="#" class="extarn btn-transparent btn-pink border">Amazon</button>
            <button onclick="#" class="extarn btn-transparent btn-pink border">Web</button>        
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 card swe">
          <div class="col-xs-12 col-sm-12 col-md-4 card-image">
            <img src="{{ URL::asset('img/Peppy_Family_Happy.jpg') }}">
          </div>
          <div class="col-xs-12 col-sm-12  col-md-8 card_content index" style="padding:0 33px;">   
            <h3 style="color: #333; font-weight: bold;" >Lär känna Peppy Pals karaktärerna</h3>
            <p>
            I Peppy Pals värld får du lära känna hästen Sammy, hunden Reggy, kaninen Gabby, ugglan Izzy och katten Kelly med deras olika personligheter. Tillsammans ger de sig ut på olika spännande äventyr. Här kan du se en kort film och läsa mer om vännerna.
            </p>
            <button onclick="#" class="extarn btn-transparent btn-pink border">Se film</button>
            <button onclick="#" class="extarn btn-transparent btn-pink border">Lär känna karaktärerna och deras namn</button>      
          </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12 card eng">
          <div class="col-xs-12 col-sm-12 col-md-4 card-image">
            <img src="{{ URL::asset('img/Peppy_Family_Happy.jpg') }}">
          </div>
          <div class="col-xs-12 col-sm-12  col-md-8 card_content index" style="padding:0 33px;">   
            <h3 style="color: #333; font-weight: bold;" >Get to know the Peppy Pals’ characters:</h3>
            <p> In Peppy Pals’ world you get to know the friends Sammy the horse, Reggy the dog, Gabby the rabbit, Izzy the owl and Kelly the cat, each of whom have unique personalities. Together, they go on many exciting adventures. Below you can watch a short movie and read more about the friends.
            </p>
            <button onclick="#" class="extarn btn-transparent btn-pink border">Watch movie</button>
            <button onclick="#" class="extarn btn-transparent btn-pink border">Get to know the Pal</button>      
          </div>
      </div>
    </div>

</div>
@include('partial.footer')
@endsection
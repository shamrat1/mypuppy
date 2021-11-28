@extends('layouts.myApp')
@section('content')
<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li>
                <a href="javascript:void(0)">
                <span>Product Guarantee Registration</span>
                </a>
             </li>
         </ul>
</div>
<div class="container">

             <h1 class="title-page text-center">Product Guarantee Registration</h1>
             <div class="sz-form-wrapper sz-product-registration-form-wrapper">
    <h2>Why register your purchase?</h2>
    
    <p>
    We know how easy it is to lose or misplace a receipt, which is why registering your Snooza product here gives you peace of mind that your purchase is on file with us, should you need us or our repair service.
    </p>
    
    
    <div class="container">
    <h2>Your Details</h2>
    <form class="my-form">
    <div class="row">
      <div class="column">
    
        <div class="form-group">
            <label for="form-name">First Name *</label>
            <input type="text" class="form-control" id="form-name" placeholder="First Name">
        </div>
      </div>
        <div class="column">
        <div class="form-group">
          <label for="form-name">Sur Name *</label>
          <input type="text" class="form-control" id="form-name" placeholder="Sur Name">
      </div>
        </div>
    </div>
    
    <div class="row">
      <div class="column">
        <div class="form-group">
          <label for="form-phone">Phone</label>
          <input type="text" class="form-control" id="form-phone" placeholder="Phone">
      </div>
        </div>
      <div class="column">
        <div class="form-group">
            <label for="form-email">Email Address *</label>
            <input type="email" class="form-control" id="form-email" placeholder="Email Address">
          </div>
        </div>
      </div>
      <div class="row">
      <div class="column">
        <div class="form-group">
            <small>
              If you're including your email we may be in touch... but only a few times a year. We understand that this is a scary prospect in today's world of spam but please give us a try. Information we send will relate to new products, our factory sale (a very exclusive invitation!) & even calls for product testers or models! Opening up the lines of communication helps us to make better products so we will not abuse this by bombarding you with pointless stuff & we will never offer your details to another company.
            </small>
        </div>
      </div>
    </div>
      <div class="row">
          <div class="column">
        <div class="form-group">
          <label for="form-address">Address :</label>
          <textarea class="form-control" id="form-Address" placeholder="Address" style="resize: none;"></textarea>
      </div>
    </div>
    </div>
      <div class="row">
        <div class="column">
        <div class="form-group">
            <label for="form-suburb">Suburb</label>
            <input type="text" class="form-control" id="form-suburb" placeholder="Suburb">
        </div>
      </div>
      <div class="column">
        <div class="form-group">
            <label for="form-state">State</label>
            <input type="text" class="form-control" id="form-state" placeholder="State">
        </div>
      </div>
      </div>
      <div class="row">
      <div class="column">
        <div class="form-group">
          <label class="form-postcode">Postcode</label>
          <input type="text" name="postcode"  class="form-control" id="postcode" placeholder="Postcode">
        </div>
      </div>
        <div class="column">
          <div class="form-group">
          <label class="form-country">Country</label>
          <input type="text" name="country"  class="form-control" id="country" placeholder="Country">
        </div>
      </div>
      </div>
      
      <h2>Your Pet's Details</h2>
      <hr>
      <div class="row">
        <div class="column">
            <div class="form-group">
              Because they deserve something special on their birthday!
            </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
            <div class="form-group">
              <label for="form-name">Pet Name *</label>
              <input type="text" class="form-control" id="form-name" placeholder="Name">
            </div>
        </div>
        <div class="column">
          <div class="form-group">
            <label for="form-breed">Pet Breed *</label><br>
            <select name="petbreed" id="form-breed" class="p-2">
              <option selected disabled>-- Select one --</option>
              <option value="abysinnian">Abysinnian</option>
              <option value="afgan">Afgan</option>
              <option value="africanis">Africanis</option>
              <option value="airedale terrier">Airedale Terrier</option>
              <option value="akita">Akita</option>
              <option value="akita x">Akita x</option>
              <option value="alaskan malamute">Alaskan Malamute</option>
              <option value="american pitt bull terrier">American Pitt Bull Terrier</option>
              <option value="american pitt bull terrier x">American Pitt Bull Terrier X</option>
              <option value="american staffordshire terrier">American Staffordshire Terrier</option>
              <option value="anatolian shepherd">Anatolian Shepherd</option>
              <option value="anatolian shepherd x">Anatolian Shepherd X</option>
              <option value="andean tiger hound">Andean Tiger Hound</option>
              <option value="australia mist cat">Australia Mist Cat</option>
              <option value="australian shepherd">Australian Shepherd</option>
              <option value="australian silky terrier">Australian Silky Terrier</option>
              <option value="australian silky terrier x">Australian Silky Terrier X</option>
              <option value="australian stumpy tail cattle dog">Australian Stumpy Tail Cattle Dog</option>
              <option value="australian terrier">Australian Terrier</option>
              <option value="bandog">Bandog</option>
              <option value="basenji">Basenji</option>
              <option value="bassett hound">Bassett Hound</option>
              <option value="bassett hound x">Bassett Hound X</option>
              <option value="beagalier">Beagalier</option>
              <option value="beagle">Beagle</option>
              <option value="beagle x">Beagle X</option>
              <option value="bearded collie">Bearded Collie</option>
              <option value="bedlington terrier">Bedlington Terrier</option>
              <option value="belgian shepherd">Belgian Shepherd</option>
              <option value="bengal cat">Bengal Cat</option>
              <option value="bernese mountain dog">Bernese Mountain Dog</option>
              <option value="bichon frise">Bichon Frise</option>
              <option value="bichon frise x">Bichon Frise X</option>
              <option value="birman cat">Birman Cat</option>
              <option value="birman cat x">Birman Cat X</option>
              <option value="bloodhound">Bloodhound</option>
              <option value="blue great dane">Blue Great Dane</option>
              <option value="blue heeler">Blue Heeler</option>
              <option value="blue heeler x">Blue Heeler X</option>
              <option value="blue russian">Blue Russian</option>
              <option value="border collie">Border Collie</option>
              <option value="border collie x">Border Collie X</option>
              <option value="border terrier">Border Terrier</option>
              <option value="borzoi">Borzoi</option>
              <option value="boston terrier">Boston Terrier</option>
              <option value="bouvier des flandres">Bouvier des Flandres</option>
              <option value="boxer">Boxer</option>
              <option value="boxer x">Boxer X</option>
              <option value="briard">Briard</option>
              <option value="british short haired cat">British Short Haired Cat</option>
              <option value="brittany spaniel">Brittany Spaniel</option>
              <option value="bull arab">Bull Arab</option>
              <option value="bull arab x">Bull Arab X</option>
              <option value="bull mastiff">Bull Mastiff</option>
              <option value="bull mastiff x">Bull Mastiff X</option>
              <option value="bull terrier">Bull Terrier</option>
              <option value="bull terrier x">Bull Terrier X</option>
              <option value="bulldog">Bulldog</option>
              <option value="bulldog american">Bulldog American</option>
              <option value="bulldog australian">Bulldog Australian</option>
              <option value="bulldog miniature">Bulldog Miniature</option>
              <option value="burmese">Burmese</option>
              <option value="burmese x">Burmese X</option>
              <option value="burmilla cat">Burmilla Cat</option>
              <option value="cairn terrier">Cairn Terrier</option>
              <option value="cairn terrier x">Cairn Terrier X</option>
              <option value="cane corso">Cane Corso</option>
              <option value="cat">Cat</option>
              <option value="cattle dog">Cattle Dog</option>
              <option value="cattle dog blue">Cattle Dog Blue</option>
              <option value="cattle dog x">Cattle Dog X</option>
              <option value="cavalier king charles spaniel">Cavalier King Charles Spaniel</option>
              <option value="cavalier king charles spaniel x">Cavalier King Charles Spaniel X</option>
              <option value="cavoodle">Cavoodle</option>
              <option value="chesapeake bay retriever">Chesapeake Bay Retriever</option>
              <option value="chi">Chi</option>
              <option value="chi x">Chi X</option>
              <option value="chihuahua">Chihuahua</option>
              <option value="chihuahua x">Chihuahua X</option>
              <option value="chinchilla cat">Chinchilla Cat</option>
              <option value="chinchilla cat x">Chinchilla Cat X</option>
              <option value="chinese crested">Chinese Crested</option>
              <option value="chow chow">Chow Chow</option>
              <option value="cockalier">Cockalier</option>
              <option value="cocker spaniel">Cocker Spaniel</option>
              <option value="cocker spaniel x">Cocker Spaniel X</option>
              <option value="collie">Collie</option>
              <option value="collie rough">Collie Rough</option>
              <option value="collie smooth">Collie Smooth</option>
              <option value="collie x">Collie X</option>
              <option value="corgi">Corgi</option>
              <option value="corgi x">Corgi X</option>
              <option value="cornish rex">Cornish Rex</option>
              <option value="cross  unknown ">Cross Breed (unknown)</option>
              <option value="curly retriever">Curly Retriever</option>
              <option value="curly retriever x">Curly Retriever X</option>
              <option value="dachshund">Dachshund</option>
              <option value="dachshund long haired">Dachshund Long Haired</option>
              <option value="dachshund long haired miniature">Dachshund Long Haired Miniature</option>
              <option value="dachshund miniature">Dachshund Miniature</option>
              <option value="dachshund shorthaired">Dachshund Shorthaired</option>
              <option value="dachshund wire haired">Dachshund Wire Haired</option>
              <option value="dachshund x">Dachshund X</option>
              <option value="dalmatian">Dalmatian</option>
              <option value="dalmatian x">Dalmatian X</option>
              <option value="dandie dinmont x">Dandie Dinmont X</option>
              <option value="deerhound">Deerhound</option>
              <option value="devon rex cat">Devon Rex Cat</option>
              <option value="dingo x">Dingo X</option>
              <option value="doberman pinscher">Doberman Pinscher</option>
              <option value="doberman pinscher x">Doberman Pinscher X</option>
              <option value="dog">Dog</option>
              <option value="dogue de bordeaux">Dogue De Bordeaux</option>
              <option value="english boodle">English Boodle</option>
              <option value="english bull terrier">English Bull Terrier</option>
              <option value="english mastiff">English Mastiff</option>
              <option value="english pointer">English Pointer</option>
              <option value="english pointer x">English Pointer X</option>
              <option value="english setter">English Setter</option>
              <option value="english springer">English Springer</option>
              <option value="english springer x">English Springer X</option>
              <option value="eurasier">Eurasier</option>
              <option value="exotic short haired cat">Exotic Short Haired Cat</option>
              <option value="finnish lapphund">Finnish Lapphund</option>
              <option value="finnish spitz">Finnish Spitz</option>
              <option value="fox hound x">Fox Hound X</option>
              <option value="fox terrier">Fox Terrier</option>
              <option value="fox terrier miniature">Fox Terrier Miniature</option>
              <option value="fox terrier miniature x">Fox Terrier Miniature X</option>
              <option value="fox terrier x">Fox Terrier X</option>
              <option value="french bulldog">French Bulldog</option>
              <option value="french mastiff">French Mastiff</option>
              <option value="german koolie">German Koolie</option>
              <option value="german koolie x">German Koolie X</option>
              <option value="german pinscher">German Pinscher</option>
              <option value="german pointer x">German Pointer X</option>
              <option value="german shepherd">German Shepherd</option>
              <option value="german shepherd x">German Shepherd X</option>
              <option value="german short haired pointer">German Short Haired Pointer</option>
              <option value="german short haired pointer x">German Short Haired Pointer X</option>
              <option value="german spitz">German Spitz</option>
              <option value="german wire haired pointer">German Wire Haired Pointer</option>
              <option value="golden retriever">Golden Retriever</option>
              <option value="golden retriever x">Golden Retriever X</option>
              <option value="gordon setter">Gordon Setter</option>
              <option value="great dane">Great Dane</option>
              <option value="great dane x">Great Dane X</option>
              <option value="great pyranees mountain dog">Great Pyranees Mountain Dog</option>
              <option value="greek harehound">Greek Harehound</option>
              <option value="greyhound">Greyhound</option>
              <option value="greyhound x">Greyhound X</option>
              <option value="griffon">Griffon</option>
              <option value="groodle">Groodle</option>
              <option value="guide dog">Guide Dog</option>
              <option value="havanese">Havanese</option>
              <option value="heeler">Heeler</option>
              <option value="heeler x">Heeler X</option>
              <option value="himalayan cat">Himalayan Cat</option>
              <option value="hovawart">Hovawart</option>
              <option value="hungarian vizsla">Hungarian Vizsla</option>
              <option value="huntaway x">Huntaway X</option>
              <option value="husky">Husky</option>
              <option value="irish setter">Irish Setter</option>
              <option value="irish terrier">Irish Terrier</option>
              <option value="irish terrier x">Irish Terrier X</option>
              <option value="irish water spaniel">Irish Water Spaniel</option>
              <option value="irish wolf hound">Irish Wolf Hound</option>
              <option value="irish wolf hound x">Irish Wolf Hound X</option>
              <option value="italian greyhound">Italian Greyhound</option>
              <option value="italian spinone">Italian Spinone</option>
              <option value="jack russell">Jack Russell</option>
              <option value="jack russell x">Jack Russell X</option>
              <option value="japanese bobtail">Japanese Bobtail</option>
              <option value="japanese chin">Japanese Chin</option>
              <option value="japanese shiba">Japanese Shiba</option>
              <option value="japanese spitz">Japanese Spitz</option>
              <option value="jindo">Jindo</option>
              <option value="kangaroo">Kangaroo</option>
              <option value="keeshond">Keeshond</option>
              <option value="kelpie">Kelpie</option>
              <option value="kelpie x">Kelpie X</option>
              <option value="koolie">Koolie</option>
              <option value="koolie x">Koolie X</option>
              <option value="korat cat">Korat cat</option>
              <option value="kuvasz">Kuvasz</option>
              <option value="labradoodle">Labradoodle</option>
              <option value="labrador">Labrador</option>
              <option value="labrador x">Labrador X</option>
              <option value="lagotto romagnolo">Lagotto Romagnolo</option>
              <option value="lakeland terrier">Lakeland Terrier</option>
              <option value="leonberger">Leonberger</option>
              <option value="lhasa apso">Lhasa Apso</option>
              <option value="lhasa apso x">Lhasa Apso X</option>
              <option value="lowchen">Lowchen</option>
              <option value="lurcher">Lurcher</option>
              <option value="maine coon cat">Maine Coon Cat</option>
              <option value="maltalier">Maltalier</option>
              <option value="maltese">Maltese</option>
              <option value="maltese miniature">Maltese Miniature</option>
              <option value="maltese x">Maltese X</option>
              <option value="manchester terrier">Manchester Terrier</option>
              <option value="manx cat">Manx Cat</option>
              <option value="maremma sheepdog">Maremma Sheepdog</option>
              <option value="mastiff bull terrier">Mastiff Bull Terrier</option>
              <option value="mastiff bull terrier x">Mastiff Bull Terrier X</option>
              <option value="moodle">Moodle</option>
              <option value="munsterlander large">Munsterlander Large</option>
              <option value="munsterlander small">Munsterlander Small</option>
              <option value="neopolitan mastiff">Neopolitan Mastiff</option>
              <option value="newfoundland">Newfoundland</option>
              <option value="norwegian elkhound">Norwegian Elkhound</option>
              <option value="norwegian forest cat">Norwegian Forest Cat</option>
              <option value="norwich terrier">Norwich Terrier</option>
              <option value="nova scotia duck tolling retriever">Nova Scotia Duck Tolling Retriever</option>
              <option value="old english sheep dog">Old English Sheep Dog</option>
              <option value="oriental">Oriental</option>
              <option value="papillon">Papillon</option>
              <option value="papillon x">Papillon X</option>
              <option value="patterdale terrier">Patterdale Terrier</option>
              <option value="pekinese">Pekinese</option>
              <option value="persian">Persian</option>
              <option value="persian x">Persian X</option>
              <option value="petit basset griffon vendeen">Petit Basset Griffon Vendeen</option>
              <option value="pharaoh hound">Pharaoh Hound</option>
              <option value="pharaoh hound x">Pharaoh Hound X</option>
              <option value="pinscher miniature">Pinscher Miniature</option>
              <option value="pittbull x">Pittbull X</option>
              <option value="pointer">Pointer</option>
              <option value="pointer x">Pointer X</option>
              <option value="pomeranian">Pomeranian</option>
              <option value="pomeranian x">Pomeranian X</option>
              <option value="poodle">Poodle</option>
              <option value="poodle miniature">Poodle Miniature</option>
              <option value="poodle standard">Poodle Standard</option>
              <option value="poodle toy">Poodle Toy</option>
              <option value="poodle x">Poodle X</option>
              <option value="portugese water dog">Portugese Water Dog</option>
              <option value="presa canario">Presa Canario</option>
              <option value="pug">Pug</option>
              <option value="pug x">Pug X</option>
              <option value="pugalier">Pugalier</option>
              <option value="puli">Puli</option>
              <option value="pyrenian mountain dog">Pyrenian Mountain Dog</option>
              <option value="rabbit">Rabbit</option>
              <option value="rag doll cat">Rag Doll Cat</option>
              <option value="red cattle dog">Red Cattle Dog</option>
              <option value="red cattle dog x">Red Cattle Dog X</option>
              <option value="red cloud kelpie">Red Cloud Kelpie</option>
              <option value="red heeler">Red Heeler</option>
              <option value="red heeler x">Red Heeler X</option>
              <option value="retriever">Retriever</option>
              <option value="retriever x">Retriever X</option>
              <option value="rex cat">Rex Cat</option>
              <option value="rhodesian ridgeback">Rhodesian Ridgeback</option>
              <option value="rhodesian ridgeback x">Rhodesian Ridgeback X</option>
              <option value="rottweiler">Rottweiler</option>
              <option value="rottweiler x">Rottweiler X</option>
              <option value="rough collie">Rough Collie</option>
              <option value="russian blue">Russian Blue</option>
              <option value="russian blue cat">Russian Blue Cat</option>
              <option value="saluki">Saluki</option>
              <option value="samoyd">Samoyd</option>
              <option value="samoyd x">Samoyd X</option>
              <option value="schipperke">Schipperke</option>
              <option value="schipperke x">Schipperke X</option>
              <option value="schnauzer">Schnauzer</option>
              <option value="schnauzer miniature">Schnauzer Miniature</option>
              <option value="schnauzer miniature x">Schnauzer Miniature X</option>
              <option value="schnauzer x">Schnauzer X</option>
              <option value="schnoodle">Schnoodle</option>
              <option value="scotch collie">Scotch Collie</option>
              <option value="scottish fold cat">Scottish Fold Cat</option>
              <option value="scottish terrier">Scottish Terrier</option>
              <option value="scottish terrier x">Scottish Terrier X</option>
              <option value="sealyham terrier">Sealyham Terrier</option>
              <option value="shar pei">Shar Pei</option>
              <option value="shar pei x">Shar Pei X</option>
              <option value="sheepdog">Sheepdog</option>
              <option value="sheepdog x">Sheepdog X</option>
              <option value="sheepoodle">Sheepoodle</option>
              <option value="sheltie">Sheltie</option>
              <option value="sheltie x">Sheltie X</option>
              <option value="shetland sheepdog">Shetland Sheepdog</option>
              <option value="shiba inu">Shiba Inu</option>
              <option value="shih tzu">Shih Tzu</option>
              <option value="shih tzu x">Shih Tzu X</option>
              <option value="siamese">Siamese</option>
              <option value="siamese x">Siamese X</option>
              <option value="siberian husky">Siberian Husky</option>
              <option value="silky terrier">Silky Terrier</option>
              <option value="smithfield">Smithfield</option>
              <option value="smithfield x">Smithfield X</option>
              <option value="somali cat">Somali Cat</option>
              <option value="spanador">Spanador</option>
              <option value="spaniel">Spaniel</option>
              <option value="spaniel x">Spaniel X</option>
              <option value="sphynx cat">Sphynx Cat</option>
              <option value="spoodle">Spoodle</option>
              <option value="spotted mist cat">Spotted Mist Cat</option>
              <option value="springer spaniel">Springer Spaniel</option>
              <option value="st bernard">St Bernard</option>
              <option value="st bernard x">St Bernard X</option>
              <option value="staffordshire bull terrier">Staffordshire Bull Terrier</option>
              <option value="staffordshire bull terrier x">Staffordshire Bull Terrier X</option>
              <option value="staghound">Staghound</option>
              <option value="staghound x">Staghound X</option>
              <option value="swedish vallhund">Swedish Vallhund</option>
              <option value="tenterfield terrier">Tenterfield Terrier</option>
              <option value="tenterfield terrier x">Tenterfield Terrier X</option>
              <option value="terrier">Terrier</option>
              <option value="terrier x">Terrier X</option>
              <option value="tibetan spaniel">Tibetan Spaniel</option>
              <option value="tibetan spaniel x">Tibetan Spaniel X</option>
              <option value="tibetan terrier">Tibetan Terrier</option>
              <option value="tibetan yak herder">Tibetan Yak Herder</option>
              <option value="tonkinese">Tonkinese</option>
              <option value="unknown">-unknown</option>
              <option value="weimaraner">Weimaraner</option>
              <option value="weimaraner x">Weimaraner X</option>
              <option value="welsh corgi">Welsh Corgi</option>
              <option value="welsh corgi x">Welsh Corgi X</option>
              <option value="welsh springer spaniel">Welsh Springer Spaniel</option>
              <option value="welsh springer spaniel x">Welsh Springer Spaniel X</option>
              <option value="welsh terrier">Welsh Terrier</option>
              <option value="west highland terrier">West Highland Terrier</option>
              <option value="west highland terrier x">West Highland Terrier X</option>
              <option value="wheaten terrier">Wheaten Terrier</option>
              <option value="whippet">Whippet</option>
              <option value="whippet x">Whippet X</option>
              <option value="white shepherd">White Shepherd</option>
              <option value="wolfhound">Wolfhound</option>
              <option value="wolfhound x">Wolfhound X</option>
              <option value="wombat">Wombat</option>
              <option value="yorkshire terrier">Yorkshire Terrier</option>
              <option value="yorkshire welsh corgi">Yorkshire Welsh Corgi</option>
              <option value="other">*Other*</option>
            </select>
          </div>
        </div>
    
      
        <div class="column">
          <div class="form-group">
            <label for="form-name">Birthday</label>
            <input type="date" class="form-control" id="form-name" placeholder="Birthday">
          </div>
      </div>
        </div>
      </div>
      <h2>Your Purchase Details</h2>
      <hr>
      <div class="row">
        <div class="column">
          <div class="form-group">
            <label class="form-storename">Store name *</label>
            <input type="text" class="form-control" name="storename" placeholder="Store name" required>
          </div>
        </div>
          <div class="column">
            <div class="form-group">
            <label class="form-storesuburb">Suburb *</label>
            <input type="text" class="form-control" name="storesuburb" placeholder="Suburb" required>
          </div>
          </div>
          <div class="column">
            <div class="form-group">
            <label class="form-storestate">State *</label>
            <input type="text" class="form-control" name="storestate" placeholder="State">
          </div>
        </div>
      </div>
      <h2>Products Purchased</h2>
        <hr>
      <div class="row">
        <div class="column">
          <div class="form-group">
            <label class="form-product">Product *</label>
            <select name="product"  class="p-2" required>
              <option selected disabled>--Select One--</option>
              <?php $products=App\Models\Product::orderBy('name','asc')->get(); ?>
              @foreach ($products as $product)
                  <option value="{{ $product->id }}">{{ $product->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
        <h4>Our Repair service &amp; Birthday Gift program are only available in Australia.</h4>            
    
    </div>
    
    </div>
    <div class="mb-3 p-3 text-center">
    <button class="btn btn-default" type="submit">Register now</button> 
    </div>
    </form>
    </div>
</div>
@endsection
      </div>
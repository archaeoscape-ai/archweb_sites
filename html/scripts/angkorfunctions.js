function loader(state) {
  if (state == "on") {
      $( "#loading" ).fadeIn( "fast", function() {});  
  } 
  if (state == "off") {
      $( "#loading" ).fadeOut( "slow", function() {});  
  }  
}

function cleargeo() {
      $( "#geodiv" ).slideUp( "fast" );
      myMarker.setMap(null);  
}


function sidebartoggle(action) {
  //alert('State is ' + sidebarstate);
  if (action == "change") {
    //alert('action is change');
    if (sidebarstate == "on") {
      //alert('state is on, so change is to turn off');
      $( "#sidebar" ).animate({left: "-=400",}, "fast");
      $( "#menubutton" ).animate({left: "-=340",}, "fast");
      $( "#sidetoolbar" ).animate({left: "-=400",}, "fast");
      $( "#geodiv" ).slideUp( "fast" );
      myMarker.setMap(null);  
      sidebarstate = 'off';
    }
    else if (sidebarstate == "off") {
      //alert('state is off, so change is to turn on');
      $( "#sidebar" ).animate({left: "+=400",}, "fast");
      $( "#menubutton" ).animate({left: "+=340",}, "fast");
      $( "#sidetoolbar" ).animate({left: "+=400",}, "fast");
      sidebarstate = 'on';
    }
  }
  else if (sidebarstate == "on") {
    if (action == "off") {
      //alert('current state is on, and the action is off');
      $( "#sidebar" ).animate({left: "-=400",}, "fast");
      $( "#menubutton" ).animate({left: "-=340",}, "fast");
      $( "#sidetoolbar" ).animate({left: "-=400",}, "fast");
      $( "#geodiv" ).slideUp( "fast" );
      myMarker.setMap(null);  
      sidebarstate = 'off';
    }  
  }
  else if (sidebarstate == "off") {
    if (action == "on") {
      //alert('current state is off, and the action is on');
      $( "#sidebar" ).animate({left: "+=400",}, "fast");
      $( "#menubutton" ).animate({left: "+=340",}, "fast");
      $( "#sidetoolbar" ).animate({left: "+=400",}, "fast");
      sidebarstate = 'on';
    }  
  }
}



function sidecontent(str) {
  
  //alert('BEFORE == ' + str);
  
  var url = str.replace(/amp;/g, '')

  //alert('NOW URL IS == ' + url);
  //alert('NOW STR IS == ' + url);

  document.getElementById('sidebarcontent').src = url;
  sidebartoggle('on');
}

function resizeIframe(obj) {

    

    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    $("#sidebar").animate({ scrollTop: 0 }, "slow");
    
}    
    

function scrollup() {
    window.parent.$("#sidebar").animate({scrollTop:0}, 'slow');
}


function linkstuff(myresource,mything) {
    window.frames['linkageframe'].contentWindow.document.getElementById('theresource').value = myresource;
    window.frames['linkageframe'].contentWindow.document.getElementById('thething').value = mything;
    window.frames['linkageframe'].contentWindow.document.getElementById('linkageform').submit();
    alert('Record Modified');
    var delay=2000; //1 seconds
    setTimeout(function(){
      location.reload(true);
    }, delay); 


                
}

function highlightselected() {
     //alert('here is ' + selected);
     var mybuttons = $(".typebutton").map(function() { return this.id; }).toArray();
     //alert(mybuttons.length);

     for (z = 0; z < selected.length; z++) { 
     
          for (i = 0; i < mybuttons.length; i++) { 
              //alert('button[i] is' + mybuttons[i]);
              //alert('selected[z] is' + selected[z]);
              if (selected[z] == mybuttons[i]) {
                  //alert("matched" + selected[z] + ' to ' + mybuttons[i]);
                  document.getElementById(mybuttons[i]).className='typebutton_alt';              
              }
              
          }  
          
      }
     
}


function createlightbox(site) {
  //alert("OK" + site + " " + resource);

  myurl = ("archsiteresource_view.php?archsite_id=" + site);

  //target = window.parent.document.getElementById('myimages');
  //alert (target);
  //target.innerHTML= myurl;
  //alert(target.innnerHTML);
  
  
  $( "#myimages", parent.document ).load( myurl);
  
  //myresource = ("res" + resource);

  //alert(myresource);

  //alert(parent.document.getElementsByClassName("fancybox").length);


  
  


  //$( "#" + myresource, parent.document ).click();
  
}


function lightbox(resource) {

  myresource = ("res" + resource);

  parent.document.getElementById(myresource).click();
    
}

function gophoto() {
    $( "#photosection" ).scroll();
}

function submitmyform(formid,destination) {
  //alert(document.getElementById(formid));
  document.getElementById(formid).submit();
  //alert ("submitted");
  alert(destination);
  document.location.href = destination;
    
}
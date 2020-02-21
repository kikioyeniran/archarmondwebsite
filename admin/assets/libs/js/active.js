// function setActive() {
//   aObj = document.getElementById('sidenav').getElementsByTagName('a');
//   for(i=0;i<aObj.length;i++) {
//     console.log(aObj.length);
//     //console.log(aObj[i]);
//     if(document.location.href.indexOf(aObj[i].href)>=0) {
//       aObj[i].className='active';
//       console.log(document.location.href.indexOf(aObj[i].href))
//     }
//   }
// }

// window.onload = setActive;

$(function(){
  var current = location.pathname;
  var splitValue = current.split('/');
//   console.log(splitValue[3]);
  $('#sidenav li a').each(function(){
      var $this = $(this);
    //   console.log($this.attr('class'));
      if($this.attr('href') == splitValue[3]){

            // $this[0].addClass('active')
            console.log($this[0].className);
            // console.log('yes');
        var parentElem = $this.parent();
        console.log(parentElem);
        if(parentElem.addClass('activeness')){
          console.log(true);
        }
      }
  })
})

$(function(){
  var current = location.pathname;
  var splitValue = current.split('/');
//   console.log(splitValue[3]);
  $('#sidenav li a').each(function(){
      var $this = $(this);
    console.log($this.attr(splitValue[3]));
      // if($this.attr('href') == splitValue[3]){
      //   // $this[0].addClass('active')
      //   console.log($this[0].className);
      //   // console.log('yes');
      //   var parentElem = $this.parent();
      //   console.log(parentElem);
      //   if(parentElem.addClass('activeness')){
      //     console.log(true);
      //   }
      // }
  })
})

// $(function(){
//   var current = location.pathname;
//   console.log(current);
//   $('#specnav li a').each(function(){
//       var $this = $(this);
//       if($this.attr('href') == current){
//         //console.log($this.parent());
//         var parentElem = $this.parent();
//         if(parentElem.addClass('active-nav')){
//           console.log(true);
//         }
//       }
//   })
// })
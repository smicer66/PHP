<script type="text/javascript">  
  // toggle specific  
  function toggleDiv(id1,id2) {  
   var tag = document.getElementById(id1).style;  
   var tagicon = document.getElementById(id2);  
     
   if(tag.display == "none") {  
    tag.display = "block";  
    tagicon.innerHTML = "&nbsp;-&nbsp;";  
   } else {  
    tag.display = "none";  
    tagicon.innerHTML = "&nbsp;+&nbsp;";  
   }  
  }  
    
  function expandAll(cnt) {  
   for(var x=1; x<=cnt; x++) {  
     document.getElementById('content'+x).style.display="block";  
     document.getElementById('icon'+x).innerHTML="&nbsp;-&nbsp;";    
   }  
  }  
    
  function collapseAll(cnt) {  
   for(var x=1; x<=cnt; x++) {  
     document.getElementById('content'+x).style.display="none";  
     document.getElementById('icon'+x).innerHTML="&nbsp;+&nbsp;";    
   }  
  }  
    
 </script>  
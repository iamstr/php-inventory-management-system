<?php require_once 'php_action/core.php'; ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="assests/jquery/jquery.min.js"></script>
</head>
<body>
  

 <style>
   
   

*{
  padding:0px;
  margin:0px;
  box-sizing:border-box;
}

.lpo{
  display:flex;
  margin:0 3em;
  flex-direction:column;
}

.lpo-purchase,.lpo-address,.lpo-address,.lpo-initiated,.lpo-approved,#customers,.lpo-header{
  
  border:1px solid black;
  margin:2em;
  width:fit-content;
}
.lpo-header{
  border:none;
}

.lpo-order{
  
      border-collapse: collapse;
}

.lpo-header{
  
  width: 100%;
}



#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

.lpo-header,.lpo-approval{
  display:flex;
  flex-direction:row;
  justify-content:space-between;
}

.lpo-image{
  order:1;
}
.lpo-purchase{
  order:2;
}
.lpo-address{
  
  width: 300px;
}

.lpo-initiated-by{
  border-bottom:1px solid black;
  
}
.lpo-purchase{
  font-size:1.5em;
}

.lpo-initiated-date,.lpo-initiated-by,.lpo-purchase.lpo-purchase,.lpo-address,.lpo-address,.lpo-initiated,.lpo-approved{
 
  padding: .5em .5em;
  padding-right:8em;
}

.lpo-purchase{
  text-decoration: double underline;
}
.lpo-address p{
  font-weight:bold;
}
 </style>
 
 <div class="lpo" id="#lpo">
  <div class="lpo-header">
    <img src="./emitek_logo%20(1).png" alt=""  class="lpo-image" width="200" height="100"/>

    <div class="lpo-purchase">
      <h4 class="lpo-purchase-order">Purchase Order</h4>
    </div>
  </div>

  <div class="lpo-body">
    <div class="lpo-address">
      <p>Emitek Cleaning Limited::</p>
      <p>P.O BOX:</p>
      <p>Tel:</p>
      <p>Email:</p>
      <p>Website:</p>
    </div>

    <div class="lpo-address">
      <p>Vendor:</p>
      <p>P.O BOX:</p>
      <p>Tel:</p>
      <p>Email:</p>
      <p>Website:</p>
    </div>

    <div class="lpo-address">
      <p>Ship to:</p>
      <p>Address:</p>
      <p>Block:</p>
      <p>Contact Person:</p>
    </div>

    <table class="lpo-order" id="customers">
      <tr>
        <th>No.</th>
        <th>Item</th>
        <th>Description</th>
        <th>Qty</th>
        <th>Unit Price</th>
        <th>Total</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Maria Anders</td>
        <td>Germany</td>
        <td>Alfreds Futterkiste</td>
        <td>Maria Anders</td>
        <td>Germany</td>
      </tr>
    </table>

    <div class="lpo-approval">
      <div class="lpo-initiated">
        <div class="lpo-initiated-by">Initiated By</div>
        <div class="lpo-initiated-date"> 20 <sup>th</sup> May 2020</div>
      </div>

      <div class="lpo-approved">
        <div class="lpo-initiated-by">Approved By</div>
        <div class="lpo-initiated-date"> 20 <sup>th</sup> May 2020</div>
      </div>
    </div>
  </div>
</div>

 


 <script src="custom/js/html2canvas.js"></script>
 
 <script >
    $(document).ready(function() {
      console.log($("#lpo"))
      const lpo=$("#lpo");
      
//      html2canvas(lpo,{
//    onrendered: function (canvas) {
//       document.body.appendChild(canvas)
//    
//    const link=document.createElement("a"),image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
//    
//    document.body.appendChild(a)
//    a.hidden=true
//    a.href=image;
//    a.click()
//    }
//        
//        
//      })
      
      
      html2canvas(document.body).then(function(canvas) {
    document.body.appendChild(canvas);
        const a=document.createElement("a"),image = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
    a.setAttribute('href', image);
a.setAttribute('download', "pdf.jpg");
    
//    a.hidden=true
   
    
        document.body.appendChild(a)
        a.click()
});
    })
  
</script>

</body>
</html>

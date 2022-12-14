<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" /> 
  <meta name="description" content="A form to submit an enquiry of an Internet Plan" />
  <meta name="keywords" content="html, css, internet plan, swin-fi, enquiry" />
  <meta name="author" content="Mohammad Abdul Mostafa" />
   <link href="styles/enquire-1.css" rel="stylesheet"/>
  <title>Product Enquiry Page</title>
  <link href="enquire-1.css" rel="stylesheet"/>


 </head>
 <body>
	<header>
		<h1> Product Enquiry Form</h1>
		<nav>
				 <a href="https://protect-au.mimecast.com/s/o1_tCJypVGuX19JQsV3QfD?domain=index.html">Home</a> 
				 <a href="https://protect-au.mimecast.com/s/3iDuCK1qWKuJB7orCviwh_?domain=product.html">Products</a> 
				 <a href="https://protect-au.mimecast.com/s/6l9SCL7rXMsvmBWYUP3Mkp?domain=enquire.html">Enquiry Form</a> 
				 <a href="https://protect-au.mimecast.com/s/p3lXCMwvYOulRBr6SWfr-s?domain=about.html"> About Us</a>
				 <a href="https://protect-au.mimecast.com/s/N-NPCNLwZQCREkWMUrCj03?domain=enhancements.html">Enhancements</a>
				 
		</nav>		 
		<hr/>
</header>
<form method="post" action="./process_order.php" id="apply-form" novalidate="novalidate">
<input type="submit" value="Submit"/>
<input type="reset" value="Reset" />

<fieldset>
<legend>Personal Details</legend>
<p><label for="firstname">First Name:</label>
<input type= "text" id="firstname" name="firstname" 
maxlength= "25" size="20" required="required" pattern="^[a-zA-Z ]+$"   />
<p><label for="lastname">Last Name:</label>
<input type= "text" id="lastname" name="lastname" 
maxlength= "25" size="20" required="required" pattern="^[a-zA-Z ]+$"  />
<p><label for="email">Email:</label>
<input type= "email" id="email" name="email" placeholder="name@domain.com"
required="required"/></p>
<p><label for="phone">Mobile Number:</label>
<input type= "text" id="phone" name="phone" 
maxlength= "10" size="10" placeholder= "0466786564" required="required" pattern=\d{10} />
<p>Preferred Contact Method:
<label><input type="radio" name="contact" value="Phone" checked="checked" /> Phone </label>
<label><input type="radio" name="contact" value="Email"  /> Email </label>
<label><input type="radio" name="contact" value="post" /> post </label>
</fieldset>
<fieldset>
<legend>Address</legend>
<p><label for="unit"> Unit Number:</label>
<input type="text" id="unit" name="unit"
 required="required" size="5" pattern=\d{1,5} />
<p><label for="street"> Street Address:</label>
<input type="text" id="street" name="street"
maxlength="40" size="20" required="required" pattern="^[a-zA-Z ]+$" />
<p><label for="suburb"> Suburb:</label>
<input type="text" id="suburb" name="suburb"
maxlength="20" size="20" required="required" pattern="^[a-zA-Z ]+$"/>
<p><label for="state">State:</label>
<select name="state" id="state">
<option value="QLD" selected="selected">QLD</option>
<option value="NSW">NSW</option>
<option value="ACT">ACT</option>
<option value="VIC">VIC</option>
<option value="TAS">TAS</option>
<option value="SA">SA</option>
<option value="WA">WA</option>
<option value="NT">NT</option>
</select>
</p>
<p><label for="postcode"> Postcode:</label>
<input type="text" id="postcode" name="postcode"
maxlength="10" size="5" required="required" pattern=\d{4} />
</fieldset>

<fieldset>
<legend>Product Details</legend>
<p><label for="Data Plan Type">Data Plan Type:</label>
<select name="Data Plan Type" id="Data Plan Type">
<option value="" selected="selected">Select product</option>
<option value="Student Exclusive">Student Exclusive</option>
<option value="5G Home Internet">5G Home Internet</option>
<option value="Monthly Plan">Monthly Plan</option>
</select>
</p>
<p> Data Package:
<br />
<p><label>80GB 60mbps for 40$/mth:</label>
<input type="checkbox" name="Data Plan"  value="80GB for 40$/mth" checked="checked" />
<label>Unlimited data 100mbps for 80$/mth:</label>
<input type="checkbox" name="Data Plan"  value="Unlimited data 100mbps for 60/mth"  />
<p><label>45GB 50mbps for 30$/mth:</label>
<input type="checkbox" name="Data Plan"  value="45GB for 15$/mth"  />
<label>200GB 100mbps for 60$/mth:</label>
<input type="checkbox" name="Data Plan"  value="150GB for 60$/mth"  />
<p><label>20GB 50mbps for 15$/mth:</label>
<input type="checkbox" name="Data Plan"  value="30GB for 20$/mth"  />

</p>
<p><label>Details of Enquiry<br />
<textarea name="enquirydetails" rows="15" cols="15">
Write details of enquiry here.....
</textarea>
</label><p>
</fieldset>

</form>
</body>


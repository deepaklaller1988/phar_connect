@extends('layouts.app')

@section('content')
<div class="staticContent">
    <div class="wrapper">
        <div class="staticPages">
<div class="contactForm">
<div class="card-header headerBG-register">Contact Us</div>
<div class="contactFormInner">
    <form>
<section>
    <label>Name</label>
    <input type="text"/>
</section>
<section>
    <label>Email</label>
    <input type="email"/>
</section>
<section>
    <label>Mobile No.</label>
    <input type="phone"/>
</section>
<section>
    <label>Desciption</label>
    <textarea placeholder="Minimum 100 letters"></textarea>
</section>
<section>
    <input type="submit" value="submit"/>
</section>
</form>
<div class="contactAdress">
<h6>Contact Infomation</h6>
<section>
<p><b>Street:</b>  4677 Fourth Avenue</p>

<p><b>City:</b>  Calgary</p>

<p><b>State/province/area:</b>   Alberta</p>

<p><b>Phone number:</b>  403-615-9433</p>

<p><b>Zip code:</b>  T2P 0H3</p>

<p><b>Country calling code:</b>  +1</p>

<p><b>Country:</b>  Canada</p>
</setion>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
   

    @extends("layout")

    @section("tittle")
    Contact
    @endsection
    
    @section("content")

    @if($errors->any())
        <p class="text-center alert alert-danger" role="alert">Not sent - {{ $errors->first() }}</p>
    @endif


    <div class="container d-flex col-md-4 justify-content-center mt-5">
    <h3>Welcome to contact page</h3>
    </div>
    <form class="container col-md-4 d-flex flex-column mt-3 py-3 gap-3" method='POST' action='/send-contact'>
        
        {{ csrf_field() }}
        <input type="text" name="name" class="form-control border border-dark" placeholder="Please enter your name">
        <input type="email" name="email" class="form-control border border-dark" placeholder="Please enter you email">
        <input type="text" name="subject" class="form-control border border-dark" placeholder="Please enter subject">
        <textarea name="message" class="form-control border border-dark" rows="5" placeholder="Please enter your message"></textarea>
        <button type="submit" class="btn btn-primary w-25 btn-sm mt-5 mx-auto">Send</button>
    </form>

    <iframe class="container col-md-4 mt-5 d-flex justify-content-center" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2827.967384057362!2d17.665314712560164!3d44.86295877323152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDTCsDUxJzQ2LjYiTiAxN8KwNDAnMDQuNCJF!5e0!3m2!1sen!2sba!4v1769422300987!5m2!1sen!2sba" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    @endsection

    
    


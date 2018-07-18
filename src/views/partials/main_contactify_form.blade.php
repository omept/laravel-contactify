<form method="post" id="contactifyForm" action="{{ route('contactify_post') }}">

    {{ csrf_field() }}
    <br style="clear:both">
    @if(isset($dont_show_contactify_form_title) && $dont_show_contactify_form_title)
        <h3 style="margin-bottom: 25px; text-align: center;">{{  config('contactify.form-title', "Contactify Form")}}</h3>
    @endif
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
    </div>
    <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
    </div>

    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message_body" name="message_body"
                              placeholder="Message" maxlength="140"
                              rows="7" required></textarea>
        <span class="help-block">
            <p id="characterLeft" class="help-block ">You have reached the limit</p></span>
    </div>
    <button type="submit" class="hide" id="hiddenSubmitForForm"></button>
    @if(isset($dont_show_contactify_submit_btn) && $dont_show_contactify_submit_btn)
        <input type="submit" id="submit" class="btn btn-primary pull-right" value="Submit">
    @endif
</form>

<script>
    $(document).ready(function () {
        $('#characterLeft').text('{{  config('contactify.message_length', 140)}} characters left');
        $('#message_body').keydown(function () {
            var max = "{{  config('contactify.message_length', 140)}}";
            var len = $(this).val().length;
            if (len >= max) {
                $('#characterLeft').text('You have reached the limit');
                $('#characterLeft').addClass('red');
                $('#btnSubmit').addClass('disabled');
            }
            else {
                var ch = max - len;
                $('#characterLeft').text(ch + ' characters left');
                $('#btnSubmit').removeClass('disabled');
                $('#characterLeft').removeClass('red');
            }
        });
    });

</script>
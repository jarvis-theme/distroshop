<div id="newsletter_footer" class="col-sm-6">
    <h2 class="title">Newsletter</h2>
    <form class="fl" action="{{@$mailing->action}}" method="post" target="_blank" novalidate>
        <input class="input-newsletter" type="text" {{ @$mailing->action==''?'disabled="disabled"':'' }} placeholder="Masukkan email anda" name="EMAIL" class="input-medium required email" id="newsletter mce-EMAIL"/>
        <button type="submit" class="btn" {{ @$mailing->action==''?'disabled="disabled" style="opacity:0.5"':'' }}>Subscribe</button>
    </form>
</div>
<x-layoutMain :avatar="$setting->imageAvatar" :nomPrenom="$setting->nomPrenom" pageActuel="contact">
<script src='https://www.google.com/recaptcha/api.js'></script>
<section class="theme">
  <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
      <form action="{{Route('contact.sendMail')}}" method="post" class="space-y-8">
        @csrf
          <div>
              <label for="email" class="field-border">Votre mail</label>
              <input type="email" id="email" name="email" class="field" placeholder="exemple@mail.com" required>
          </div>
          <div>
              <label for="nom" class="field-border">Nom</label>
              <input type="text" id="nom" name="nom" class="field" placeholder="Nom" required>
          </div>
          <div class="sm:col-span-2">
              <label for="message" class="field-border">Votre message</label>
              <textarea id="message" name="message" rows="6" class="field" placeholder="Que souhaitez-vous écrire ?"></textarea>
          </div>
          <div>
            <strong class="field-border">ReCaptcha:</strong>
            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
            @if ($errors->has('g-recaptcha-response'))
                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            @endif
          </div>  
          <button type="submit" class="button">Envoyer le message</button>
      </form>
  </div>
</section>
</x-layoutMain>
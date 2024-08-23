<div class="sidebar-info">
    <figure class="avatar-box">
        <img src="{{ isset($about->image) ? asset('storage/profile/' . $about->image) : '/assets_front/images/my-avatar.png' }}"
            alt="image profie" width="80">
    </figure>
    <div class="info-content">
        <h1 class="name" title="people">{{ $about->user->name }}</h1>
        <p class="title">{{ $about->title }}</p>
    </div>
    <button class="info_more-btn" data-sidebar-btn>
        <span>Show Contacts</span>
        <ion-icon name="chevron-down"></ion-icon>
    </button>
</div>
<div class="sidebar-info_more">
    <div class="separator"></div>
    <ul class="contacts-list">
        <li class="contact-item">
            <div class="icon-box">
                <ion-icon name="mail-outline"></ion-icon>
            </div>
            <div class="contact-info">
                <p class="contact-title">Email</p>
                <a href="mailto:{{ $user->email }}" class="contact-link">{{ $user->email }}</a>
            </div>
        </li>
        <li class="contact-item">
            <div class="icon-box">
                <ion-icon name="phone-portrait-outline"></ion-icon>
            </div>
            <div class="contact-info">
                <p class="contact-title">Phone</p>
                <a href="tel:+62{{ $about->phone }}" class="contact-link">{{ '+62' . $about->phone }}</a>
            </div>
        </li>
        <li class="contact-item">
            <div class="icon-box">
                <ion-icon name="location-outline"></ion-icon>
            </div>
            <div class="contact-info">
                <p class="contact-title">Address</p>
                <address>{{ $about->address . ', ' }} {{ $about->country }}</address>
            </div>
        </li>
    </ul>
    <div class="separator"></div>
    <ul class="social-list">
        <li class="social-item">
            <a href="{{ 'https://wa.me/62' . $about->whatsapp .'?text=Hai%20Arjun' }}" target="_blank" class="social-link">
                <ion-icon name="logo-whatsapp"></ion-icon>
            </a>
        </li>
        <li class="social-item">
            <a href="{{ $about->linkedin }}" target="_blank" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
            </a>
        </li>
        <li class="social-item">
            <a href="{{ $about->facebook }}" target="_blank" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
            </a>
        </li>
        <li class="social-item">
            <a href="{{ $about->twitter }}" target="_blank" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
            </a>
        </li>
        <li class="social-item">
            <a href="{{ $about->instagram }}" target="_blank" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>
            </a>
        </li>
    </ul>
</div>

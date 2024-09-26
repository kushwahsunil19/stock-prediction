<!-- resources/views/vendor/cookieConsent/dialogContents.blade.php -->
<div id="cookieConsentContainer">
    <div id="cookieConsentDialog">
          <p>
            Our website uses cookies to provide your browsing experience. Before continuing to use our website, you agree & accept of our <a href="{{url('privacy')}}">Privacy Policy</a>. Otherwise leave this website.
        </p>
        <button id="cookieConsentButton">Accept Cookie!</button>
    </div>
</div>

<style>
    #cookieConsentContainer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #000;
        color: #fff;
        text-align: center;
        padding: 10px 0;
        z-index: 1000;
    }

    #cookieConsentButton {
        margin-left: 20px;
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var consentButton = document.getElementById('cookieConsentButton');
        consentButton.addEventListener('click', function() {
            document.getElementById('cookieConsentContainer').style.display = 'none';

            fetch('{{ route('cookieConsent.store') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            }).then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            }).then(data => {
                console.log('Cookie consent saved:', data);
            }).catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
        });
    });
</script>

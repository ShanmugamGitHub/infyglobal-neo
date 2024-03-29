
Developers@Agileitexperts : a8fdf330-6bed-4ca8-bc66-fa2c76fb88a7

Admin@agileitexperts : fa7542bb-bbed-489a-bc39-6e4b97599ff8

Shanmugam: f63d3ace-1e97-403c-b622-d1251c33cf7d







<form method="POST" id="contact-form">

    <input type="hidden" name="access_key" value="f63d3ace-1e97-403c-b622-d1251c33cf7d">

   Name  <input type="text" name="name" required> <br/>
    mail <input type="email" name="email" required> <br />
    msg <textarea name="message" required></textarea> <br/>

    <button type="submit">Submit Form</button> <br/>
    <div id="result"></div>

</form>





<script>
    const form = document.getElementById('contact-form');
const result = document.getElementById('result');

form.addEventListener('submit', function(e) {
  e.preventDefault();
  const formData = new FormData(form);
  const object = Object.fromEntries(formData);
  const json = JSON.stringify(object);
  result.innerHTML = "Please wait..."

    fetch('https://api.web3forms.com/submit', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: json
        })
        .then(async (response) => {
            let json = await response.json();
            if (response.status == 200) {
                result.innerHTML = json.message;
            } else {
                console.log(response);
                result.innerHTML = json.message;
            }
        })
        .catch(error => {
            console.log(error);
            result.innerHTML = "Something went wrong!";
        })
        .then(function() {
            form.reset();
            setTimeout(() => {
                result.style.display = "none";
            }, 3000);
        });
});
</script>

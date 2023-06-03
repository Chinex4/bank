<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Approve Deposit</title>
  <style>
      .card {
  position: relative;
  width: 300px;
  height: 400px;
  margin: 20px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  transition: transform 0.5s cubic-bezier(0.215, 0.61, 0.355, 1);
  margin: auto;
}

.card__image {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  border-radius: 10px;
}

.card__image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s cubic-bezier(0.215, 0.61, 0.355, 1);
}

.card__content {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 20px;
  background-color: #fff;
  transition: transform 0.5s cubic-bezier(0.215, 0.61, 0.355, 1);
}

.card__title {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

.card__text {
  font-size: 16px;
  line-height: 1.5;
  margin-bottom: 20px;
}

.card__button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #000;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
}

.card:hover {
  transform: translateY(-10px);
}

.card:hover .card__image img {
  transform: scale(1.2);
}

.card:hover .card__content {
  transform: translateY(-100%);
}

.card__image {
  height: 400px;
  width: 300px;
  background-color: #000;
  /* you can put img url here  */
}
      .header{
        text-align: center;
        padding: 0 0 5px;
      }
  </style>
</head>
<body>
  <div class="card">
    <div class="card__image">
        <img src="{{  asset('storage/transaction-image/'.$invoices->image) }}" alt="">
    </div>
    <div class="card__content">
      <p class="card__title">Username</p>
      <p class="card__text">{{ $username }}</p>
      <a class="card__button" href="javascript:void()">${{  $invoices->amount }}</a>
    </div>
  </div>
    <p style="text-align:center">{{ config('app.name') }}</p>
</body>
</html>

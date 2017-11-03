    <div class="announcement container b-main-profile__container">
        <h4>
            Для завершення процедури замовлення необхідно перейти
            на сторінку нашого партнера з електронних платежів та обрати зручний спосіб для оплати.
        </h4>
        <h5>Це повністю захищена процедура та несе ризику для фінансової безпеки платника. Проте, всеодно, ми радимо бути пильними та обачними при вводі своїх персональних даних.</h5>
        <h5>Не передавайте свої персональні дані, номер замовлення або інші важливі дані третім особам.</h5>
        <div class="payment-form">
            <form method="POST" action="https://www.liqpay.ua/api/3/checkout" accept-charset="utf-8">
                <input type="hidden" name="data"
                       value="<?= $data ?>"/>
                <input type="hidden" name="signature" value="<?= $signature ?>"/>
                <input type="submit" class="btn btn-success payment-btn" value="Сплатити">
            </form>
        </div>
    </div>


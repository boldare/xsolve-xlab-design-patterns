Klient poprosił nas, o stworzenie API sklepu internetowego.
Dwie funkcje zamówione przez klienta to możliwość wypisania dostępnych produktów, oraz możliwość złożenia zamówienia (w sklepie nie ma koszyka).

Utwórz dwa nowe endpointy w API dla ścieżek **GET /products** oraz **POST /order**.

Zgodne ze specyfikacją odpowiednio:

GET /products
-------------

Parametry (query params):

- **category**: _string_ - odfiltrowuje wyniki biorąc pod uwagę nazwę kategorii, lub jej fragment
- **promo_only**: _bool_ - ma uwzględnić tylko produkty promocyjne?
- **available_only** _bool_ - tylko produkty dostępne?
- **price_min**: _int_ - dolny zakres cenowy
- **price_max**: _int_ - górny zakres cenowy

- _[opcjonalne]_ **page**: _int_ - numer strony
- _[opcjonalne]_ **per_page**: _int_ - ilość wyników na stronę
- _[opcjonalne]_ **order_by**: _string_ - nazwa pola po, którym chcesz sortować wyniki

Dozwolone wartości to: **id**, **name**, **price**, **category**, **vat**

- _[opcjonalne]_ **order_direction**: _string_ - kierunek sortowania

Dozwolone wartości to **ASC**, **DESC**

Produkt składa się z pól:
- id _int_
- name _string_
- description _string_
- netPrice _int_
- availability _int_
- category _string_
- vatRate _int_
- isPromo  _bool_

**UWAGA: Produkty nie muszą znajdować się w bazie danych.**

POST /order
-----------

Parametry (payload):

- **client_id** _int_ - id zamawiającego
- **items** _array_ - tablica zawierająca:
- **item_id** _int_ - id produktu
- **count** _int_ - ilość zamówionego produktu

W odpowiedzi powinniśmy otrzymać zawartość zamówienia z obliczoną wartością do zapłaty z podziałem na wartość netto i brutto.

Reguły biznesowe:
-----------------

- zamawiając 4 sztuki produktu promocyjnego, dostajemy rabat 15%,
- zamawiając 2 sztuki produktu promocyjnego, dostajemy rabat 5%,
- zamawiając 3 sztuki produktu promocyjnego, 4 sztuka jest gratis,

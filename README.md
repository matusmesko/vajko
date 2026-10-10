# Názov projektu

Matúš Meško

5ZYI33

## Stručný opis projektu
ŠtudentskýBazár je webová aplikácia, v ktorej si študenti medzi 
sebou predávajú a kupujú veci, ktoré potrebujú počas štúdia.
Predajca vytvorí inzerát s fotkami, cenou a opisom, záujemca ho nájde pomocou vyhľadávania a filtrov a priamo v aplikácii sa s predajcom dohodne cez správy.


## Role v projekte
- **Používateľ** – registrovaný študent. Vytvára, upravuje a maže vlastné inzeráty (vrátane nahrávania fotiek), mení ich stav (aktívny, rezervovaný, predaný), píše správy iným používateľom, ukladá inzeráty medzi obľúbené, nahlasuje nevhodné inzeráty a spravuje svoj profil.
- **Administrátor** – správca systému. Spravuje kategórie, vybavuje nahlásenia, môže zmazať ľubovoľný inzerát a zablokovať používateľa. Má prístup k prehľadu všetkých inzerátov a používateľov.

## Prípady použitia podľa rolí
**Používateľ**
- Vytvorí inzerát (názov, opis, cena, kategória, stav tovaru, viac fotiek).
- Upraví alebo zmaže vlastný inzerát, vymení alebo odstráni jeho fotky.
- Zmení stav inzerátu na rezervovaný alebo predaný.
- Pridá inzerát medzi obľúbené a odstráni ho z obľúbených.
- Napíše predajcovi správu k inzerátu a vedie s ním konverzáciu.
- Nahlási nevhodný inzerát s uvedením dôvodu.
- Upraví svoj profil.

**Administrátor**
- Vytvára, upravuje a maže kategórie.
- Prezerá nahlásenia a rozhoduje o nich.
- Maže nevhodné inzeráty a blokuje alebo odblokuje používateľov.

## Plánované entity
- **User** (používateľ) – id, meno, e-mail, heslo (hash), rola (user/admin), telefón (voliteľné), profilová fotka, blokovaný, dátum registrácie. Vzťahy: vlastní inzeráty, píše správy, ukladá obľúbené, podáva nahlásenia.
- **Category** (kategória) – id, názov, popis. Účel: členenie inzerátov (učebnice, elektronika, internát, oblečenie…). Vzťah: jedna kategória má viac inzerátov.
- **Listing** (inzerát) – id, názov, opis, cena, stav tovaru (nový, ako nový, použitý), stav inzerátu (aktívny, rezervovaný, predaný), dátum vytvorenia, id predajcu, id kategórie. Hlavná entita aplikácie.
- **ListingImage** (fotka inzerátu) – id, id inzerátu, cesta k súboru, poradie, hlavná fotka. Účel: uloženie nahraných fotiek.
- **Conversation** (konverzácia) – id, id inzerátu, id kupujúceho, dátum vytvorenia. Účel: zoskupenie správ medzi kupujúcim a predajcom k jednému inzerátu.
- **Message** (správa) – id, id konverzácie, id odosielateľa, text, dátum odoslania, prečítaná. Účel: jednotlivé správy v konverzácii.
- **Report** (nahlásenie) – id, id inzerátu, id nahlasujúceho, dôvod, stav (nové, vybavené), dátum. Účel: moderácia obsahu.
- **Favorite** (obľúbené) – asociačná tabuľka medzi User a Listing (id používateľa, id inzerátu, dátum pridania).

## Vzťahy medzi entitami
- **User – Listing: 1:N.** Jeden používateľ môže mať viac inzerátov, inzerát má práve jedného predajcu.
- **Category – Listing: 1:N.** Jedna kategória obsahuje viac inzerátov, inzerát patrí do jednej kategórie.
- **Listing – ListingImage: 1:N.** Inzerát má viac fotiek, fotka patrí k jednému inzerátu.
- **User – Listing cez Favorite: M:N.** Používateľ môže mať obľúbených viac inzerátov a inzerát môže byť obľúbený u viacerých používateľov. Rozkladá sa asociačnou tabuľkou Favorite.
- **Listing – Conversation: 1:N.** K jednému inzerátu môže existovať viac konverzácií (s rôznymi záujemcami). Konverzácia je jedinečná pre dvojicu inzerát a kupujúci.
- **User – Conversation: 1:N** (v role kupujúceho). Predajca je určený cez inzerát.
- **Conversation – Message: 1:N.** Konverzácia obsahuje viac správ.
- **User – Message: 1:N.** Používateľ môže odoslať viac správ.
- **Listing – Report: 1:N** a **User – Report: 1:N.** Inzerát môže mať viac nahlásení a používateľ môže podať viac nahlásení.

## Hlavné stránky aplikácie
1. **Domov / zoznam inzerátov** – zoznam aktívnych inzerátov s kartami, živým vyhľadávaním, filtrami (kategória, cena, stav) a stránkovaním.
2. **Detail inzerátu** – fotogaléria, opis, cena, informácie o predajcovi, tlačidlá pre obľúbené, nahlásenie a napísanie správy.
3. **Pridanie / úprava inzerátu** – formulár s validáciou a nahrávaním viacerých fotiek (náhľad, mazanie, zmena hlavnej fotky).
4. **Moje inzeráty** – tabuľka vlastných inzerátov so zmenou stavu a rýchlymi akciami (upraviť, zmazať).
5. **Správy** – zoznam konverzácií a okno konverzácie s priebežným načítavaním nových správ.
6. **Obľúbené** – zoznam uložených inzerátov.
7. **Prihlásenie a registrácia** – formuláre s kontrolou vstupov.
8. **Profil používateľa** – úprava osobných údajov, profilovej fotky a zmena hesla.
9. **Administrácia – kategórie** – tabuľka kategórií s úpravou priamo v riadku.
10. **Administrácia – nahlásenia a používatelia** – prehľad nahlásení, mazanie inzerátov, blokovanie používateľov.


## Rozdelenie funkcionality
**Základné funkcie**
- Registrácia, prihlásenie, odhlásenie, hashovanie hesiel, roly a autorizácia prístupu.
- Plné CRUD pre inzeráty a kategórie.
- Nahrávanie a správa fotiek inzerátov (kontrola typu a veľkosti súboru).
- Vyhľadávanie, filtrovanie a stránkovanie inzerátov cez AJAX bez znovunačítania stránky.
- Správy medzi kupujúcim a predajcom s priebežným načítavaním cez AJAX.
- Obľúbené inzeráty (AJAX pridanie a odobratie).
- Nahlasovanie inzerátov a ich vybavovanie administrátorom.
- Validácia vstupov na klientovi aj serveri, ochrana proti SQL injection (prepared statements), ochrana formulárov (CSRF), escapovanie výstupu.
- Responzívny dizajn a spustenie v Dockeri s ukážkovými dátami pri prvom štarte.

**Rozširujúce funkcie**
- Počítadlo neprečítaných správ a označovanie správ ako prečítaných.
- Zobrazenie miesta odovzdania tovaru na mape (Leaflet / OpenStreetMap) alebo využitie geolokácie.
- Náhľad fotiek pred nahraním a zoradenie fotiek presúvaním (HTML5 File API a Drag and Drop).
- Hodnotenie predajcov po dokončení predaja.
- Zoradenie inzerátov (najnovšie, cena) a uloženie obľúbených vyhľadávaní.
- Blokovanie používateľov administrátorom s históriou moderovania.
- Pokročilá validácia formulárov na strane klienta (napr. kontrola formátu súborov a ceny v reálnom čase).
# Mój pierwszy projekt
# IMAPSYNC Web GUI

Prosty interfejs webowy do uruchamiania narzędzia `imapsync`.

## Funkcje

- Wybór języka (PL/EN/DE/FR) zapamiętywany w ciasteczkach.
- Przycisk zamiany kont źródłowych i docelowych.
- Sekcja dodatkowych parametrów (`--subfolder2`, `--delete2`, `--move`).
- Podgląd logu z synchronizacji w przeglądarce.

## Wymagane oprogramowanie

- Serwer WWW z obsługą PHP (np. wbudowany serwer `php -S`).
- Zainstalowane narzędzie `imapsync` dostępne w systemie.

## Uruchomienie

1. W katalogu projektu uruchom lokalny serwer PHP:

   ```bash
   php -S localhost:8000
   ```

2. Otwórz w przeglądarce stronę `http://localhost:8000/index.html`.

Logi z działania programu zapisywane są w katalogu `logs/` w plikach z datą i godziną synchronizacji.

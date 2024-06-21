<?php
// Set strict types
declare(strict_types=1);

class Album {

    private ?int $ID;
    private string $Naam;
    private string $Artiesten;
    private string $Release_datum;
    private ?string $URL;
    private string $Afbeelding;
    private string $Prijs;

    /**
     * @param int|null $ID
     * @param string $Naam
     * @param string $Artiesten
     * @param string $Release_datum
     * @param string|null $URL
     * @param string $Afbeelding
     * @param string $Prijs
     */
    public function __construct(?int $ID, string $Naam, string $Artiesten, string $Release_datum, ?string $URL, string $Afbeelding, string $Prijs)
    {
        $this->ID = $ID;
        $this->Naam = $Naam;
        $this->Artiesten = $Artiesten;
        $this->Release_datum = $Release_datum;
        $this->URL = $URL;
        $this->Afbeelding = $Afbeelding;
        $this->Prijs = $Prijs;
    }

    public function getID(): ?int
    {
        return $this->ID;
    }

    public function setID(?int $ID): void
    {
        $this->ID = $ID;
    }

    public function getNaam(): string
    {
        return $this->Naam;
    }

    public function setNaam(string $Naam): void
    {
        $this->Naam = $Naam;
    }

    public function getArtiesten(): string
    {
        return $this->Artiesten;
    }

    public function setArtiesten(string $Artiesten): void
    {
        $this->Artiesten = $Artiesten;
    }

    public function getReleaseDatum(): string
    {
        return $this->Release_datum;
    }

    public function setReleaseDatum(string $Release_datum): void
    {
        $this->Release_datum = $Release_datum;
    }

    public function getURL(): ?string
    {
        return $this->URL;
    }

    public function setURL(?string $URL): void
    {
        $this->URL = $URL;
    }

    public function getAfbeelding(): string
    {
        return $this->Afbeelding;
    }

    public function setAfbeelding(string $Afbeelding): void
    {
        $this->Afbeelding = $Afbeelding;
    }

    public function getPrijs(): string
    {
        return $this->Prijs;
    }

    public function setPrijs(string $Prijs): void
    {
        $this->Prijs = $Prijs;
    }

    /**
     * Haalt alle personen op uit de database.
     *
     * @param PDO $db De PDO-databaseverbinding.
     * @return Album[] Een array van Persoon-objecten.
     */
    public static function getAll(PDO $db): array
    {
        // Voorbereiden van de query
        $stmt = $db->query("SELECT * FROM album");

        // Array om personen op te slaan
        $albums = [];

        // Itereren over de resultaten en personen toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $album = new album(
                $row['ID'],
                $row['Naam'],
                $row['Artiesten'],
                $row['Release_datum'],
                $row['URL'],
                $row['Afbeelding'],
                $row['Prijs']
            );
            $albums[] = $album;
        }

        // Retourneer array met personen
        return $albums;
    }

}

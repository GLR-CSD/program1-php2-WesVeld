<?php
// Set strict types
declare(strict_types=1);

class Nummer {

    private ?int $ID;
    private string $AlbumID;
    private string $Titel;
    private string $Duur;
    private ?string $URL;

    /**
     * @param int|null $ID
     * @param string $AlbumID
     * @param string $Titel
     * @param string $Duur
     * @param string|null $URL
     */
    public function __construct(?int $ID, string $AlbumID, string $Titel, string $Duur, ?string $URL)
    {
        $this->ID = $ID;
        $this->AlbumID = $AlbumID;
        $this->Titel = $Titel;
        $this->Duur = $Duur;
        $this->URL = $URL;
    }

    public function getURL(): ?string
    {
        return $this->URL;
    }

    public function setURL(?string $URL): void
    {
        $this->URL = $URL;
    }

    public function getDuur(): string
    {
        return $this->Duur;
    }

    public function setDuur(string $Duur): void
    {
        $this->Duur = $Duur;
    }

    public function getTitel(): string
    {
        return $this->Titel;
    }

    public function setTitel(string $Titel): void
    {
        $this->Titel = $Titel;
    }

    public function getAlbumID(): string
    {
        return $this->AlbumID;
    }

    public function setAlbumID(string $AlbumID): void
    {
        $this->AlbumID = $AlbumID;
    }

    public function getID(): ?int
    {
        return $this->ID;
    }

    public function setID(?int $ID): void
    {
        $this->ID = $ID;
    }



    /**
     * Haalt alle personen op uit de database.
     *
     * @param PDO $db De PDO-databaseverbinding.
     * @return Nummer[] Een array van Persoon-objecten.
     */
    public static function getAll(PDO $db): array
    {
        // Voorbereiden van de query
        $stmt = $db->query("SELECT * FROM nummer");

        // Array om personen op te slaan
        $nummers = [];

        // Itereren over de resultaten en personen toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nummer = new Nummer(
                $row['ID'],
                $row['AlbumID'],
                $row['Titel'],
                $row['Duur'],
                $row['URL'],
            );
            $nummers[] = $nummer;
        }

        // Retourneer array met personen
        return $nummers;
    }

}

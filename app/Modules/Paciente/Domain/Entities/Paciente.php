<?php

namespace App\Modules\Paciente\Domain\Entities;

use App\Core\Domain\AggregateRoot;
use App\Core\Domain\ValueObjects\Email;
use App\Core\Domain\ValueObjects\PhoneNumber;
use App\Core\Domain\ValueObjects\DateValue;
use App\Core\Domain\ValueObjects\FullName;
use App\Core\Domain\ValueObjects\DocumentNumber;
use app\Core\Domain\ValueObjects\Id;
use app\Core\Domain\ValueObjects\StringValue;

class Paciente extends AggregateRoot
{
    public function __construct(
        ?Id $id,
        private FullName $name,
        private DocumentNumber $documentNumber,
        private DateValue $birthDate,
        private Email $email,
        private PhoneNumber $phone,
        private StringValue $address,
        private bool $isActive = true,
        ?\DateTimeImmutable $createdAt = null,
        ?\DateTimeImmutable $updatedAt = null,

    ) {
        parent::__construct($id, $createdAt, $updatedAt);
    }

    public function name(): FullName { return $this->name; }
    public function documentNumber(): DocumentNumber { return $this->documentNumber; }
    public function birthDate(): DateValue { return $this->birthDate; }
    public function email(): Email { return $this->email; }
    public function phone(): PhoneNumber { return $this->phone; }
    public function address(): StringValue { return $this->address; }
    public function isActive(): bool { return $this->isActive; }

    public function deactivate(): void { $this->isActive = false; }
    public function activate(): void { $this->isActive = true; }


    public function update(
    FullName $name,
    DocumentNumber $documentNumber,
    DateValue $birthDate,
    Email $email,
    PhoneNumber $phone,
    StringValue $address
    ): void {
        $this->name = $name;
        $this->documentNumber = $documentNumber;
        $this->birthDate = $birthDate;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->updatedAt = new \DateTimeImmutable();
    }

}

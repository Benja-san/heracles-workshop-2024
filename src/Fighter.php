<?php

/* Fighter class definition */
class Fighter {

    public const MAX_LIFE = 100;

    private int $life = self::MAX_LIFE ;

    public function __construct(
        private string $name,
        private int $strength,
        private int $dexterity
    ){}


    /**
     * Get the value of life
     */ 
    public function getLife(): int
    {
        return $this->life;
    }

    /**
     * Set the value of life
     *
     * @return  self
     */ 
    public function setLife($life)
    {
        $this->life = $life;

        return $this;
    }

        /**
         * Get the value of name
         */ 
        public function getName() : string
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of strength
         */ 
        public function getstrength() : int
        {
                return $this->strength;
        }

        /**
         * Set the value of strength
         *
         * @return  self
         */ 
        public function setstrength($strength)
        {
                $this->strength = $strength;

                return $this;
        }

        /**
         * Get the value of dexterity
         */ 
        public function getDexterity() : int
        {
                return $this->dexterity;
        }

        /**
         * Set the value of dexterity
         *
         * @return  self
         */ 
        public function setDexterity($dexterity)
        {
                $this->dexterity = $dexterity;

                return $this;
        }

        public function isAlive(): bool
        {
            return $this->life > 0;
        }

        public function fight(Fighter $opponent): void
        {
            $attackPower = rand(1, $this->strength);
            $opponentDexterity = $opponent->getDexterity();
            $attackFinalPower = $attackPower - $opponentDexterity;
            $damage = $attackFinalPower <= 0 ? 0 : $attackFinalPower;
            $opponentTotalDamage = $opponent->getLife() - $damage;
            $opponentRemainingLife = $opponentTotalDamage <= 0 ? 0 : $opponentTotalDamage;
            $opponent->setLife($opponentRemainingLife);
        }
}
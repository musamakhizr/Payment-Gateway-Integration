<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a bulk create request for `TeamMember` objects.
 */
class BulkCreateTeamMembersRequest implements \JsonSerializable
{
    /**
     * @var array
     */
    private $teamMembers;

    /**
     * @param array $teamMembers
     */
    public function __construct(array $teamMembers)
    {
        $this->teamMembers = $teamMembers;
    }

    /**
     * Returns Team Members.
     *
     * The data used to create the `TeamMember` objects. Each key is the `idempotency_key` that maps to the
     * `CreateTeamMemberRequest`.
     */
    public function getTeamMembers(): array
    {
        return $this->teamMembers;
    }

    /**
     * Sets Team Members.
     *
     * The data used to create the `TeamMember` objects. Each key is the `idempotency_key` that maps to the
     * `CreateTeamMemberRequest`.
     *
     * @required
     * @maps team_members
     */
    public function setTeamMembers(array $teamMembers): void
    {
        $this->teamMembers = $teamMembers;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return mixed
     */
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        $json['team_members'] = $this->teamMembers;
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}

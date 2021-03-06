<?php
/**
 * STRESS WEB
 * @author S.T.R.E.S.S.
 * @copyright 2008 - 2012 STRESS WEB
 * @version 13
 * @web http://stressweb.ru
*/
if (!defined("STRESSWEB")) die ("Access denied...");

$qList["EmuRT"] = array (

	"fields" => array(
		"accessLevel"=>"accessLevel",
		"charID"=>"charId",
		),
	
	"itemType" => array (
		0	=> "dress",
		1	=> "leftearring",
		2	=> "rightearring",
		4	=> "necklace",
		5	=> "rightring",
		6	=> "leftring",
		8	=> "helmet",
		9	=> "weapon",
		11	=> "gloves",
		12	=> "top",
		13	=> "lower",
		14	=> "bots",

		3	=> "shield",
		7	=> "weapon",
		10	=> "shield",
		15	=> "righthair",
		16	=> "weapon",
		17	=> "lefthair",
		18	=> "lefthair",
		20	=> "righthair",
		22	=> "braslet",
		),

	"insAccount" => "
		INSERT INTO `accounts` (`login`,`password`,`accessLevel`,`l2email`) 
		VALUES ('{login}','{pass}','0','{l2email}')",
	
	"insItem" => "
			INSERT INTO `items` (`owner_id`,`object_id`,`item_id`,`count`,`enchant_level`,`loc`,`loc_data`) 
			VALUES ('{ownerID}', '{objectID}', '{itemID}', '{count}', '{enchant}', 'INVENTORY', '0')",
	
	"setPassword" => "
		UPDATE `accounts` 
		SET `password`='{pass}' 
		WHERE `login`='{login}'",
	
	"setAccessLevelAccount" => "
		UPDATE `accounts` 
		SET `accessLevel`='{level}' 
		WHERE `login`='{login}'",
		
	"setAccessLevelCharacter" => "
		UPDATE `characters` 
		SET `isBanned`='{level}' 
		WHERE `charId`='{charID}'",
		
	"setTeleport" => "
		UPDATE `characters` 
		SET `x`='{x}',`y`='{y}',`z`='{z}',`lastteleport`='{lastteleport}'
		WHERE `charId`='{charID}'",
	
	"setItem" => "
		UPDATE `items` 
		SET `count`='{count}', `enchant_level`='{enchant}' 
		WHERE `object_id`='{objectID}'",
	
	"setItemCount" => "
		UPDATE `items`
		SET `count` = '{count}'
		WHERE `owner_id` = '{ownerID}' AND `object_id` = '{objectID}'",
			
	"getCountAccounts" => "
		SELECT count(0) 
		FROM accounts {where}",
	
	"getCountCharacters" => "
		SELECT count(0) 
		FROM characters {where}",
	
	"getCountClans" => "
		SELECT count(0) 
		FROM clan_data",
	
	"getCountHuman" => "
		SELECT count(0) 
		FROM characters 
		WHERE race='0' AND isBanned='0'",
	
	"getCountElf" => "
		SELECT count(0) 
		FROM characters 
		WHERE race='1' AND isBanned='0'",
	
	"getCountDElf" => "
		SELECT count(0) 
		FROM characters 
		WHERE race='2' AND isBanned='0'",
	
	"getCountOrc" => "
		SELECT count(0) 
		FROM characters 
		WHERE race='3' AND isBanned='0'",
	
	"getCountDwarf" => "
		SELECT count(0) 
		FROM characters 
		WHERE race='4' AND isBanned='0'",
	
	"getCountKamael" => "
		SELECT count(0) 
		FROM characters 
		WHERE race='5' AND isBanned='0'",
	
	"getCountDawn" => "
		SELECT count(0) 
		FROM seven_signs 
		WHERE cabal='dawn'",
	
	"getCountDusk" => "
		SELECT count(0) 
		FROM seven_signs 
		WHERE cabal='dusk'",
	
	"getAccount" => "
		SELECT login,password,lastactive,accessLevel,lastIP 
		FROM `accounts` 
		WHERE `login`='{login}' {where} 
		LIMIT 1",
		
	"getAccounts" => "
		SELECT login,lastactive,accessLevel,lastIP 
		FROM `accounts` {where}
		ORDER BY {order} 
		LIMIT {limit}",
		
	"getCharactersList" => "
		SELECT characters.account_name, characters.charId, characters.char_name, characters.level, characters.isBanned AS accesslevel, characters.lastAccess, char_templates.ClassName 
		FROM `characters` 
		LEFT JOIN `char_templates` ON characters.base_class = char_templates.ClassId {where}
		ORDER BY characters.char_name 
		LIMIT {limit}",
	
	"getCharacter" => "
		SELECT characters.account_name, characters.char_name, characters.level, characters.sex, characters.base_class, characters.online, characters.exp, characters.sp, characters.karma, characters.pvpkills, characters.pkkills, characters.isBanned AS accesslevel, characters.onlinetime, characters.lastAccess, char_templates.ClassName, clan_data.clan_name 
		FROM `characters` 
		LEFT JOIN `char_templates` ON characters.base_class = char_templates.ClassId 
		LEFT JOIN `clan_data` ON characters.clanid = clan_data.clan_id 
		WHERE characters.charId='{charID}'",
		
	"getCharacterInfo" => "
		SELECT characters.account_name, characters.char_name, characters.level, characters.maxHp, characters.maxCp, characters.maxMp, characters.sex, characters.exp, characters.sp, characters.pvpkills, characters.pkkills, characters.karma, characters.race, characters.base_class, characters.isBanned AS accesslevel, characters.lastAccess, char_templates.ClassName, char_templates.STR, char_templates.CON, char_templates.DEX, char_templates._INT, char_templates.WIT, char_templates.MEN 
		FROM `characters` 
		LEFT JOIN `char_templates` ON characters.base_class = char_templates.ClassId 
		WHERE characters.charId='{charID}'",
		
	"getAccountCharacters" => "
		SELECT characters.account_name, characters.charId AS charID, characters.char_name, characters.level, characters.isBanned AS accesslevel, characters.lastAccess, characters.online, characters.onlinetime, characters.in_jail, char_templates.ClassName, clan_data.clan_name 
		FROM `characters` 
		LEFT JOIN `char_templates` ON characters.base_class = char_templates.ClassId
		LEFT JOIN `clan_data` ON characters.clanid = clan_data.clan_id
		WHERE characters.account_name='{account}' 
		ORDER BY characters.char_name",
	
	"getTopClan"=>"
		SELECT clan_data.clan_name, clan_data.clan_id, clan_data.ally_name, clan_data.clan_level, clan_data.reputation_score, clan_data.hasCastle, characters.char_name, ccount 
		FROM `clan_data` 
		LEFT JOIN `characters` ON characters.charId = clan_data.leader_id 
		LEFT JOIN (
			SELECT clanid, count(level) AS ccount 
			FROM characters 
			WHERE clanid GROUP BY clanid
			) AS levels ON clan_data.clan_id = levels.clanid 
		ORDER BY clan_data.clan_level DESC, clan_data.reputation_score DESC 
		LIMIT {limit}",
	
	"getTop" => "
		SELECT characters.char_name, characters.level, characters.sex, characters.pvpkills, characters.pkkills, characters.online, characters.onlinetime, char_templates.ClassName, clan_data.clan_name, clan_data.clan_id 
		FROM `characters` 
		LEFT JOIN `char_templates` ON characters.classid = char_templates.ClassId 
		LEFT JOIN `clan_data` ON characters.clanid = clan_data.clan_id 
		WHERE characters.isBanned='0'
		ORDER BY characters.{order} DESC 
		LIMIT {limit}",
		
	"getRich" => "
		SELECT characters.char_name, characters.level, characters.sex, characters.online, characters.onlinetime, char_templates.ClassName, clan_data.clan_name, clan_data.clan_id, count.count 
		FROM `characters` 
		LEFT JOIN `char_templates` ON characters.classid = char_templates.ClassId 
		LEFT JOIN `clan_data` ON characters.clanid = clan_data.clan_id
		LEFT JOIN (SELECT owner_id,SUM(count) AS count FROM items WHERE item_id='{item_id}' GROUP BY owner_id) AS count ON characters.charId=count.owner_id 
		ORDER BY count DESC, level DESC, onlinetime DESC 
		LIMIT {limit}",
	
	"getClanCharacters" => "
		SELECT characters.char_name, characters.level, characters.sex, characters.pvpkills, characters.pkkills, characters.online, characters.onlinetime, char_templates.ClassName, clan_data.clan_name, clan_data.clan_id 
		FROM `characters` 
		LEFT JOIN `char_templates` ON characters.classid = char_templates.ClassId 
		LEFT JOIN `clan_data` ON characters.clanid = clan_data.clan_id 
		WHERE characters.clanid='{clanid}'
		ORDER BY characters.level DESC",
	
	"getOnline" => "
		SELECT characters.char_name, characters.level, characters.sex, characters.pvpkills, characters.pkkills, characters.online, characters.onlinetime, char_templates.ClassName, clan_data.clan_name, clan_data.clan_id 
		FROM `characters` 
		LEFT JOIN `char_templates` ON characters.classid = char_templates.ClassId 
		LEFT JOIN `clan_data` ON characters.clanid = clan_data.clan_id 
		WHERE characters.isBanned='0' AND characters.online='1'
		ORDER BY characters.level DESC, characters.onlinetime DESC",
	
	"getEpicStatus" => "
		SELECT grandboss_spawnlist.respawn_time, npc.name, npc.level 
		FROM grandboss_spawnlist 
		LEFT JOIN npc ON grandboss_spawnlist.boss_id = npc.id 
		ORDER BY npc.level DESC",
	
	"getRaidStatus" => "
		SELECT raidboss_spawnlist.respawn_time, npc.level, npc.name
		FROM raidboss_spawnlist
		LEFT JOIN npc ON raidboss_spawnlist.boss_id = npc.id
		ORDER BY npc.level DESC, npc.name ASC",
		
	"getClan" => "
		SELECT clan_name
		FROM clan_data
		WHERE clan_id='{clanid}'",
		
	"getCastles" => "
		SELECT castle.name, castle.id, castle.taxPercent, castle.siegeDate, clan_data.clan_name, clan_data.clan_id
		FROM castle
		LEFT JOIN clan_data ON clan_data.hasCastle = castle.id",
	
	"getSiege" => "
		SELECT siege_clans.castle_id, siege_clans.clan_id, siege_clans.type, clan_data.clan_name
		FROM siege_clans
		LEFT JOIN clan_data ON clan_data.clan_id = siege_clans.clan_id
		WHERE castle_id='{castle}'",
	
	"getOlympiad" => "
		SELECT characters.char_name, olympiad_nobles.olympiad_points, olympiad_nobles.competitions_done, char_templates.ClassName, characters.sex 
		FROM olympiad_nobles 
		LEFT JOIN char_templates ON olympiad_nobles.class_id = char_templates.ClassId 
		LEFT JOIN characters ON olympiad_nobles.charId = characters.charId
		ORDER BY olympiad_nobles.class_id, olympiad_nobles.olympiad_points DESC",
	
	"getInventory" => "
		SELECT items.object_id,items.item_id,items.count,items.enchant_level,items.loc, 
			CASE WHEN armor.name != '' THEN armor.name 
			WHEN weapon.name != '' THEN weapon.name 
			WHEN etcitem.name != '' THEN etcitem.name 
			END AS name, 
			CASE WHEN armor.crystal_type != '' THEN 'armor' 
			WHEN weapon.crystal_type != '' THEN 'weapon' 
			WHEN etcitem.crystal_type != '' THEN 'etc' 
			END AS `type` 
		FROM `items` 
		LEFT JOIN `armor` ON armor.item_id = items.item_id 
		LEFT JOIN weapon ON weapon.item_id = items .item_id 
		LEFT JOIN etcitem ON etcitem.item_id = items.item_id 
		WHERE items.owner_id='{charID}' 
		ORDER BY {order}",
		
	"getCharInventory" => "
		SELECT items.object_id,items.item_id,items.count,items.enchant_level,items.loc,items.loc_data,armorName,weaponName,etcName,armorType,weaponType,etcType
		FROM `items` 
		LEFT JOIN (
			SELECT item_id, name AS armorName, crystal_type AS armorType 
			FROM `armor`
			) AS aa ON aa.item_id = items.item_id 
		LEFT JOIN (
			SELECT item_id, name AS weaponName, crystal_type AS weaponType 
			FROM `weapon`
			) AS ww ON ww.item_id = items.item_id
		LEFT JOIN (
			SELECT item_id, name AS etcName, crystal_type AS etcType 
			FROM `etcitem`
			) AS ee ON ee.item_id = items.item_id
		WHERE items.owner_id='{charID}' AND items.loc='{loc}' 
		ORDER BY items.loc_data",
	
	"getItemByObjectID" => "
		SELECT `count`, `enchant_level`, `item_id` 
		FROM `items` 
		WHERE `object_id`='{objectID}'",
	
	"getLastTeleport" => "
		SELECT `char_name`,`online`,`isBanned` AS accesslevel,`in_jail`,`lastteleport` 
		FROM `characters` 
		WHERE `charId`='{charID}'",
	
	"getItem" => "
		SELECT `object_id`, `count`
		FROM `items`
		WHERE `owner_id` = '{charID}' AND `item_id` = '{itemID}' AND `loc` = 'INVENTORY'
		LIMIT 1",
	
	"getMax" => "
			SELECT MAX(`object_id`)+1 AS `max` 
			FROM `items`",
	
	"delAccounts" => "
		DELETE FROM accounts 
		WHERE login='{login}'",
	
	"delItemByID" => "
		DELETE FROM `items` 
		WHERE `item_id`='{item}'",
	
	"delCharByID" => "
		DELETE FROM `characters` 
		WHERE `charId`='{charID}'",
		
	"delItemByOwner" => "
		DELETE FROM `items` 
		WHERE `owner_id`='{charID}'",
		
	"delItemByObjectID" => "
		DELETE FROM `items` 
		WHERE `object_id`='{objectID}'",
	
	"delItemByIDOwner" => "
		DELETE FROM `items` 
		WHERE `item_id`='{item}' AND `owner_id`='{charID}'",
	
	"other" => array(
		"DELETE FROM character_friends	WHERE charId='{charID}' OR friendId='{charID}'",
		"DELETE FROM character_hennas WHERE charId='{charID}'",
		"DELETE FROM character_macroses WHERE charId='{charID}'",
		"DELETE FROM character_quests WHERE charId='{charID}'",
		"DELETE FROM character_recipebook WHERE charId='{charID}'",
		"DELETE FROM character_shortcuts WHERE charId='{charID}'",
		"DELETE FROM character_skills WHERE charId='{charID}'",
		"DELETE FROM character_skills_save WHERE charId='{charID}'",
		"DELETE FROM character_subclasses WHERE charId='{charID}'",	
		"DELETE FROM seven_signs WHERE charId='{charID}'",
		"DELETE FROM items WHERE owner_id='{charID}'",
		"DELETE FROM clan_data WHERE leader_id='{charID}'",
		),

	"l2top" => array(
		
		"getChar" => "
			SELECT account_name, charId AS charID, online
			FROM `characters`
			WHERE `char_name`='{name}'",
		
		"getItem" => "
			SELECT `item_id`,`count` 
			FROM `items` 
			WHERE `owner_id`='{ownerID}' AND `item_id`='{itemID}' AND `loc`='INVENTORY'",
		
		"getMax" => "
			SELECT MAX(`object_id`)+1 AS `max` 
			FROM `items`",
		
		"insItem" => "
			INSERT INTO `items` (`owner_id`,`object_id`,`item_id`,`count`,`enchant_level`,`loc`,`loc_data`) 
			VALUES ('{charID}', '{objectID}', '{itemID}', '{count}', '0', 'INVENTORY', '0')",
		
		"insl2top" => "
			INSERT INTO `l2top` (`nick`,`ip`,`time`) 
			VALUES ('{nick}','{ip}','{time}')",
		
		"setItem" => "
			UPDATE `items` 
			SET `count`=`count`+'{count}' 
			WHERE `owner_id`='{ownerID}' AND `item_id`='{itemID}' AND `loc`='INVENTORY'",
		),
	
	"getByLevel" => "
		SELECT char_name 
		FROM characters 
		WHERE account_name='{account}' AND level>={level} 
		LIMIT 1",
		
);
?>
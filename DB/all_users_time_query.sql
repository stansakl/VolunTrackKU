select u.user_id,
       u.NAME_FIRST,
       u.NAME_LAST,
       up.project_id,
       p.Project_Name,
       timediff(PROJECT_END_DATE_TIME, PROJECT_START_DATE_TIME) as hours
from user_project up
left outer join users u on u.user_id = up.user_id
left outer join project p on up.project_id = p.project_id
order by Project_Name

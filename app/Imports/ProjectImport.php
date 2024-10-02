<?php

namespace App\Imports;

use App\Models\Project;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProjectImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key < 4) continue;

            $projectData = [
                'in_the_portfolio_of_the_year' => $row[0],
                'status' => $row[1],
                'code' => $row[2],
                'name' => $row[3],
                'stage' => $row[4],
                'priority' => $row[5],
                'post_project_monitoring' => $row[6],
                'area_of_activity' => $row[7],
                'category' => $row[8],
                'program' => $row[9],
                'belonging_to_strategy' => (bool) $row[10] && $row[10] !== 'Нет',
                'r_g_t' => $row[11],
                'short_description' => $row[12],
                'dependencies' => $row[13],
                'short_name' => $row[91]
            ];

            $projectStatesData = [
                'sales_percentages' => $row[14],
                'general_status' => $row[15],
                'business_goals' => $row[16],
                'terms' => $row[17],
                'budgets' => $row[18],
                'content' => $row[19],
                'link_to_report' => $row[20],
            ];

            $projectOrganizationalStructuresData = [
                'client' => $row[21],
                'mp_i' => $row[22],
                'project_manager' => $row[23],
                'team_leader' => $row[24],
                'business_analyst' => $row[25],
                'composition_of_the_uk' => $row[26],
                'interested_departments' => $row[27],
                'external_persons' => $row[28],
                'program_manager' => $row[29],
                'a_d_m' => $row[30],
                'c_f_o' => $row[31],
                'business_lines' => $row[32],
            ];

            $current_actual_pre_project_terms = [
                'start' => $row[33],
                'current_actual_completion' => $row[34],
                'duration' => $row[35],
                'completion_on_request' => $row[36],
                'deviation_of_request' => $row[37]
            ];

            $current_actual_terms = [
                'start' => $row[38],
                'completion' => $row[39],
                'duration' => $row[40],
            ];

            $basic_terms = [
                'start' => $row[41],
                'completion' => $row[42],
                'deviation' => $row[43],
            ];

            $terms_according_to_passport = [
                'completion' => $row[44],
                'deviation' => $row[45],
                'year_of_start' => $row[46],
                'year_of_completion' => $row[47],
            ];

            $projectTermsData = [
                'current_actual_pre_project_terms' => json_encode($current_actual_pre_project_terms),
                'current_actual_terms' => json_encode($current_actual_terms),
                'basic_terms' => json_encode($basic_terms),
                'terms_according_to_passport' => json_encode($terms_according_to_passport),
            ];

            $pre_project_budget = [
                'profitability' => $row[48],
                'SAREH' => $row[49],
                'SAREH_FOT' => $row[50],
                'OREH' => $row[51],
                'actual_SAREH' => $row[52],
                'delta_percentage' => $row[53],
            ];

            $base_budget = [
                'SAREH' => $row[54],
                'FOT' => $row[55],
                'OREH' => $row[56],
            ];

            $budget_according_to_passport = [
                'SAREH' => $row[57],
                'FOT' => $row[58],
                'OREH' => $row[59],
                'delta_SAREH' => $row[60],
                'delta_percentage' => $row[61],
            ];

            $actual_budget = [
                'SAREH' => $row[62],
                'FOT' => $row[63],
                'OREH' => $row[64],
                'delta_SAREH' => $row[65],
                'delta_percentage' => $row[66],
            ];

            $projectCostsData = [
                'pre_project_budget' => json_encode($pre_project_budget),
                'base_budget' => json_encode($base_budget),
                'budget_according_to_passport' => json_encode($budget_according_to_passport),
                'actual_budget' => json_encode($actual_budget),
            ];

            $documents_on_the_beginning = [
                'decision_to_start' => $row[67],
                'decision_to_start_implementation' => $row[68],
            ];

            $change_requests = [
                'terms' => $row[69],
                'reason_for_terms' => $row[70],
                'budget' => $row[71],
                'reason_for_budget' => $row[72],
                'content' => $row[73],
                'reason_for_content' => $row[74],
            ];

            $documents_on_change_of_status_or_completion = [
                'decision_to_stop' => $row[75],
                'reason_for_stop' => $row[76],
                'decision_to_completion' => $row[77],
                'reason_for_completion' => $row[78],
            ];

            $projectDocumentsData = [
                'documents_on_the_beginning' => json_encode($documents_on_the_beginning),
                'change_requests' => json_encode($change_requests),
                'documents_on_change_of_status_or_completion' => json_encode($documents_on_change_of_status_or_completion),
            ];

            $project_product = [
                'project_product' => $row[79],
                'criterion' => $row[80],
                'status' => $row[81],
            ];

            $business_goals = [
                'business_goals' => $row[82],
                'criterion' => $row[83],
                'status' => $row[84],
            ];

            $projectGoals = [
                'project_product' => json_encode($project_product),
                'business_goals' => json_encode($business_goals),
            ];

            $projectMonitorings = [
                'sign' => $row[85],
                'status' => $row[86],
                'year_of_completion' => $row[87],
                'product' => $row[88],
                'product_manager' => $row[89],
                'product_characteristics' => $row[90],
            ];

            $project = Project::create($projectData);
            $project->projectState()->create($projectStatesData);
            $project->projectOrganizationalStructure()->create($projectOrganizationalStructuresData);
            $project->projectTerm()->create($projectTermsData);
            $project->projectCost()->create($projectCostsData);
            $project->projectDocument()->create($projectDocumentsData);
            $project->projectGoal()->create($projectGoals);
            $project->projectMonitoring()->create($projectMonitorings);
        }
    }
}

import { CommonModule } from '@angular/common';
import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-paginated-table',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './paginated-table.component.html',
  styleUrl: './paginated-table.component.css'
})
export class PaginatedTableComponent {
  @Input() columns: any[] = [];
  @Input() data: any[] = [];
}

export interface Item {
    id: number;
    code: string;
    name: string;
    description?: string;
    price: number;
    supplier_id: number;
    category_id: number;
    created_at: string;
    updated_at: string;
  }
  
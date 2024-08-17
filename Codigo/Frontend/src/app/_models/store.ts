export interface Store {
  id: number;
  name: string;
  street: string;
  city: string;
  state: string;
  country: string;
  postal_code?: string;
  user_id: number;
  created_at: Date;
  updated_at: Date;
}

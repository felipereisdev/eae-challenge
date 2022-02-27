import { Company } from './Company';
import { Languages } from './Languages';
import { Level } from './Level';
import { Role } from './Role';
import { Tools } from './Tools';

export interface Jobs {
  id: number;
  title: string;
  contract: 'Part Time' | 'Full Time' | 'Contract';
  location: string;
  created_at: string;
  new: boolean;
  featured: boolean;
  company: Company;
  role: Role;
  level: Level;
  languages: Languages[];
  tools: Tools[];
}

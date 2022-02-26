import React from 'react';
import { FaTimes } from 'react-icons/fa';

interface TechProps {
  title: string;
  filter?: boolean;
}

export function Tech({ title, filter = false }: TechProps) {
  return (
    <div className="flex">
      <span
        className={`px-2 py-1 ${
          filter ? 'rounded-l-sm' : 'rounded-sm'
        } text-sm font-bold text-header bg-gray-200`}
      >
        {title}
      </span>
      {filter && (
        <span className="rounded-r-sm bg-gray-200 text-header flex items-center hover:bg-header hover:text-white cursor-pointer">
          <FaTimes size={25} />
        </span>
      )}
    </div>
  );
}
